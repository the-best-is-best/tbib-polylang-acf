<?php
class RequirementsPolylangACF
{
    function __construct()
    {
        add_action('admin_init', array($this, 'check_polylang_and_acf'));
    }
    function check_polylang_and_acf()
    {
        if (!defined("ACF_VERSION") || version_compare( ACF_VERSION, '5.7.11', '<')) {
            
            $this->tbib_polylang_acf(__("TBIB Polylang for ACF -- Cannot work without ACF Fields PRO "));
            return false;
        }
        if (!defined("POLYLANG_BASENAME") ) {
            $this->tbib_polylang_acf(__("TBIB Polylang for  ACF -- Cannot work without polylang"));
            return false;
        }

        if (defined("TBIB_POLYLANG_BASENAME") ) {
            $this->tbib_polylang_acf(__("TBIB Polylang for ACF -- Cannot work with TBIB Polylang for WooCommerce And ACF"));
            return false;
        }
        return true;
    }

    function tbib_polylang_acf($message)
    {
        trigger_error(esc_html($message));

        add_action(
            'admin_notices',
            function () use ($message) {
                printf('<div class="notice error is-dismissible"><p>%s</p></div>', esc_html($message));
            }
        );
        deactivate_plugins(TBIB_POLYLANG_DEMO_ACF_BASENAME);
        unset($_GET['activate']);
    }
}
