<?php
namespace Concrete\Package\KintDebug;

use Illuminate\Filesystem\Filesystem;;
use Concrete\Core\Package\Package;
use View;
use Config;

defined('C5_EXECUTE') or die(_('Access Denied.'));

$fs = new Filesystem();
$fs->getRequire(__DIR__ . '/vendor/autoload.php');

class Controller extends Package {
    protected $pkgHandle = 'kint_debug';
    protected $appVersionRequired = '5.7.0.4';
    protected $pkgVersion = '0.9.4';

    public function getPackageDescription() {
        return t('Add Kint debugging tools');
    }

    public function getPackageName() {
        return t('Debug Kit');
    }

    public function on_start() {
        $al = \Concrete\Core\Asset\AssetList::getInstance();
        $al->register('css', $this->pkgHandle . '/css', 'css/debug.css', array(), $this->pkgHandle);

        $displayErrors = Config::get('concrete.debug.display_errors');

        // Only enable Kint if display_errors is true
        if (!$displayErrors) {
            \Kint::enabled(false);
        }
        else {
            // Never include the css in ajax responses
            if(!$this->isAjaxRequest()) {
                View::getInstance()->requireAsset('css', $this->pkgHandle . '/css');
            }
        }
    }

    /**
     * Check, if possible, that this execution was triggered by an AJAX request.
     * @return bool
     */
    protected function isAjaxRequest() {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }
}
