<?php
namespace Concrete\Package\DebugKit;

use Concrete\Core\Package\Package;
use View;

defined('C5_EXECUTE') or die(_("Access Denied."));

require_once __DIR__ . '/vendor/autoload.php';

class Controller extends Package {
    protected $pkgHandle = 'debug_kit';
    protected $appVersionRequired = '5.7';
    protected $pkgVersion = '0.1.0';

    public function getPackageDescription() {
        return t('Add Kint debugging tools');
    }

    public function getPackageName() {
        return t('Debug Kit');
    }

    public function on_start() {
        $al = \Concrete\Core\Asset\AssetList::getInstance();
        $al->register('css', 'debug', '../packages/debug/css/debug.css');
        View::getInstance()->requireAsset('css', 'debug');
    }
}
