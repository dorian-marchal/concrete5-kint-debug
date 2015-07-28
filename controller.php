<?php
namespace Concrete\Package\KintDebug;

use Concrete\Core\Package\Package;
use View;

defined('C5_EXECUTE') or die(_("Access Denied."));

require_once __DIR__ . '/vendor/autoload.php';

class Controller extends Package {
    protected $pkgHandle = 'kint_debug';
    protected $appVersionRequired = '5.7.0.4';
    protected $pkgVersion = '0.9.1';

    public function getPackageDescription() {
        return t('Add Kint debugging tools');
    }

    public function getPackageName() {
        return t('Kint Debug');
    }

    public function on_start() {
        $al = \Concrete\Core\Asset\AssetList::getInstance();
        $al->register('css', 'kint_debug/css', 'css/debug.css', array(), $this->pkgHandle);

        // Never include the css in ajax responses
        if(!$this->isAjaxRequest()) {
            View::getInstance()->requireAsset('css', 'kint_debug/css');
        }
    }

    /**
     * Check, if possible, that this execution was triggered by an AJAX request.
     * @return bool
     */
    protected function isAjaxRequest()
    {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }
}
