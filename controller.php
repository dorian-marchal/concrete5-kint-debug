<?php
namespace Concrete\Package\KintDebug;

use Concrete\Core\Package\Package;
use View;

defined('C5_EXECUTE') or die(t("Access Denied."));

require_once __DIR__ . '/vendor/autoload.php';

class Controller extends Package {
    protected $pkgHandle = 'kint_debug';
    protected $appVersionRequired = '5.7';
    protected $pkgVersion = '0.9.0';

    public function getPackageDescription() {
        return t('Add Kint debugging tools');
    }

    public function getPackageName() {
        return t('Kint Debug');
    }

    public function on_start() {
        $al = \Concrete\Core\Asset\AssetList::getInstance();
        $al->register('css', $this->pkgHandle . '/css', 'css/debug.css', array(), $this->pkgHandle);
        View::getInstance()->requireAsset('css', $this->pkgHandle . '/css');
    }
}
