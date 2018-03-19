<?php
namespace Cakesuit\AdminTh\Shell;

use Cake\Console\Shell;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Filesystem\File;
use Cake\Filesystem\Folder;

/**
 * Init shell command.
 */
class CakesuitAdminThInitShell extends Shell
{

    /**
     * Manage the available sub-commands along with their arguments and help
     *
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     *
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        return $parser;
    }

    /**
     * main() method.
     *
     * @return bool|int|null Success or error code.
     */
    public function main()
    {
        // Copy Asset Compress File
        $this->copyAssetConfigFile();
        $this->copyFonts();

//        $this->out($this->OptionParser->help());
    }

    public function copyAssetConfigFile()
    {
        $assetCompressFilename = 'asset_compress.ini';
        $path = $this->_getPath();
        $file = new File($path . 'config' . DS . $assetCompressFilename, false, 0644);
        if ($file->copy(CONFIG . $assetCompressFilename)) {
            $this->out('Asset Compress file is copied');
        } else {
            $this->out('Error : Asset Compress is not copied');
        }
    }

    public function copyFonts()
    {
        $pluginWebroot = $this->_getPath() . 'webroot' . DS;
        $webroot = WWW_ROOT;
        $fonts = [
            'bootstrap' . DS => 'fonts',
            'Ionicons' . DS => 'fonts',
            # Fontawesome version 4
            'font-awesome' . DS => 'fonts',
            # Fontawesome version 5
//            'font-awesome' . DS . 'web-fonts-with-css' . DS => 'webfonts',
        ];

        foreach ($fonts as $path => $filename) {
            $folder = new Folder($pluginWebroot . 'bower_components' . DS . $path . $filename);
//            dd(realpath($path . $filename));
//            dd($pluginWebroot . 'bower_components' . DS . $path . $filename);
            $folder->copy([
                'to' => WWW_ROOT . $filename,
                'scheme' => Folder::MERGE
            ]);
        }
    }

    protected function _getPath()
    {
        return Plugin::path('Cakesuit/AdminTh');
    }
}
