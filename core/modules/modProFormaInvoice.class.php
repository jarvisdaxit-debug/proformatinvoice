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
        $this->version = '1.0.6'; // Updated version
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

        // Proforma specific constants
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
            ),
            2 => array(
                'PROFORMA_REF_MASK',
                'chaine',
                'PROFORMA-{yyyy}-{00000}',
                'Reference mask for proforma invoices (e.g., PROFORMA-{yyyy}-{00000})',
                0
            ),
            3 => array(
                'PROFORMA_REF_NEXT',
                'integer',
                '1',
                'Next counter for proforma references',
                0
            ),
            4 => array(
                'PROFORMA_PDF_WATERMARK',
                'chaine',
                '1',
                'Add "PROFORMA" watermark on PDF',
                0
            ),
            5 => array(
                'PROFORMA_PDF_LEGAL_TEXT',
                'chaine',
                'This document has no fiscal value',
                'Legal text to add on proforma PDF',
                0
            ),
            6 => array(
                'PROFORMA_CONVERT_RIGHT',
                'chaine',
                'proforma_convert',
                'Required permission key to convert proforma to invoice',
                0
            )
        );

        // Rights management
        $this->rights = array();
        $r = 0;

        // Read permission for configuration
        $this->rights[$r][0] = $this->numero + 1;
        $this->rights[$r][1] = 'Read proforma invoice config';
        $this->rights[$r][2] = 'r'; // Read
        $this->rights[$r][3] = 1;   // Enabled
        $this->rights[$r][4] = 'config'; // Type: config
        $this->rights[$r][5] = 'read'; // Permission key
        $r++;

        // Write permission for configuration
        $this->rights[$r][0] = $this->numero + 2;
        $this->rights[$r][1] = 'Write proforma invoice config';
        $this->rights[$r][2] = 'w'; // Write
        $this->rights[$r][3] = 0;   // Disabled by default
        $this->rights[$r][4] = 'config'; // Type: config
        $this->rights[$r][5] = 'write'; // Permission key
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
