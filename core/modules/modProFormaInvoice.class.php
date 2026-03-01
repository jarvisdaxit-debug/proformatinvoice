<?php
include_once DOL_DOCUMENT_ROOT.'/core/modules/DolibarrModules.class.php';

class modProFormaInvoice extends DolibarrModules
{
    public function __construct($db)
    {
        $this->db = $db;
        $this->numero = 136407;
        $this->rights_class = 'proformatinvoice';

        $this->family = "commercial";
        $this->module_position = '95';
        $this->name = preg_replace('/^mod/i', '', get_class($this));
        $this->description = "Generate proforma invoices from orders and proposals";
        $this->descriptionlong = "Module to generate proforma invoices with custom templates and PDF export";
        $this->editor_name = 'Daxit Solutions';
        $this->editor_url = 'https://www.daxit.be';
        $this->version = '1.0.0';
        $this->const_name = 'MAIN_MODULE_'.strtoupper($this->name);
        $this->picto = 'bill';

        $this->module_parts = array(
            'triggers' => 1,
            'hooks' => array()
        );

        $this->dirs = array();
        $this->config_page_url = array("setup.php@proformatinvoice");

        $this->hidden = false;
        $this->depends = array('modPropale', 'modCommande', 'modFacture');
        $this->requiredby = array();
        $this->conflictwith = array();
        $this->phpmin = array(7, 4);
        $this->need_dolibarr_version = array(14, 0);
        $this->langfiles = array("proformatinvoice@proformatinvoice");

        $this->const = array(
            0 => array(
                'PROFORMAINVOICE_TEMPLATE',
                'chaine',
                'default',
                'Default proforma invoice template',
                0
            ),
            1 => array(
                'PROFORMAINVOICE_EMAIL_SUBJECT',
                'chaine',
                'Proforma Invoice',
                'Default email subject for proforma invoices',
                0
            )
        );

        $this->rights = array();
        $r = 0;

        $this->rights[$r][0] = $this->numero + 1;
        $this->rights[$r][1] = 'Read proforma invoice config';
        $this->rights[$r][2] = 'r';
        $this->rights[$r][3] = 1;
        $this->rights[$r][4] = 'config';
        $this->rights[$r][5] = 'read';
        $r++;

        $this->rights[$r][0] = $this->numero + 2;
        $this->rights[$r][1] = 'Write proforma invoice config';
        $this->rights[$r][2] = 'w';
        $this->rights[$r][3] = 0;
        $this->rights[$r][4] = 'config';
        $this->rights[$r][5] = 'write';
        $r++;

        $this->menus = array();
    }

    public function init($options = '')
    {
        $sql = array();
        return $this->_init($sql, $options);
    }

    public function remove($options = '')
    {
        $sql = array();
        return $this->_remove($sql, $options);
    }
}
