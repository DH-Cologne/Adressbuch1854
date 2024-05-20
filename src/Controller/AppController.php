<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        // $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }

    /**
     * Checks, if a value for the query param 'export' is set and builds a
     * json- or xml-file using the cakePHP viewBuilder. The file is then rendered
     * as a download instead of a view. If the param 'export' is not set or
     * contains an invalid value, the function returns with void immediately.
     *
     * Valid 'export' values are: json, xml (case insensitive).
     *
     * Note: beforeRender() function is executed before the view is rendered.
     */
    public function beforeRender($event)
    {
        // Get the format, that is to be rendered, from the query params
        $format = $this->request->getQuery('export');
        if(empty($format)) return;

        $format = strtolower($format);

        $formats = [
            'xml' => 'Xml',
            'json' => 'Json'
        ];

        // Define file name for download file according to the current Controller
        if(isset($formats[$format])){
            $filename = 'Adressbuch1854_';
            $viewVars = $this->viewBuilder()->getVars();

            if ($this->request->getParam('action') === 'view') {
                switch($this->name){
                    case 'Persons':
                        $filename .= 'P-'.$viewVars['person']->id;
                    break;

                    case 'Companies':
                        $filename .= 'C-'.$viewVars['company']->id;
                    break;

                    case 'Streets':
                        $filename .= 'S-'.$viewVars['street']->id;
                    break;

                    case 'Arrondissements':
                        $filename .= 'A-'.$viewVars['arrondissement']->id;
                    break;

                    case 'Search':
                        $filename .= 'search_results';
                    break;

                }
            } else {
                $filename .= 'overview';
            }

            $filename .= '.'.$format;

            // Set the options for the view
            $this->viewBuilder()->setClassName($formats[$format]);
            $this->viewBuilder()->setOption('serialize', true);
            $this->viewBuilder()->setOption('rootNode', 'results');

            // Set content-disposition header to force download instead of rendering a view
            $this->response = $this->response
                ->withCharset('UTF-8')
                ->withHeader('Content-Disposition', 'attachment; filename="'.$filename.'"');
        }
    }

    /**
     * Checks, if a value for the query param 'exportAll' is set and returns
     * a file of the given export-format as download containing all persons
     * and companies existing in the database. For the values sql and csv
     * static download files are used, for the values json and xml a file
     * is build using the cakePHP viewBuilder. If the param 'exportAll' is not
     * set or contains an invalid value, the function returns with void immediately.
     *
     * Valid 'exportAll' values are: json, xml, sql, csv (case insensitive).
     */
    public function export()
    {
        $format = $this->request->getQuery('exportAll');
        if(empty($format)) return;

        // sql and csv paths relative to webroot
        $csvFilePath = 'download/Adressbuch_1854_all.csv';
        $sqlFilePath = 'download/Adressbuch_1854_all.sql';

        // Get the format, that is to be rendered, from the query params
        $format = strtolower($this->request->getQuery('exportAll'));
        $formats = [
            'xml' => 'Xml',
            'json' => 'Json',
            'sql' => 'SQL',
            'csv' => 'CSV',
        ];

        // Return, if the format is invalid
        if (!isset($formats[$format])){
            return;
        }

        $filename = 'Adressbuch1854_complete.'.$format;
        $pathname = '';

        switch($format){

            // Load the static file if the format is sql or csv
            case 'csv':
                return $this->response = $this->response
                    ->withCharset('UTF-8')
                    ->withFile($csvFilePath, [
                        'download' => true,
                        'name' => $filename
                    ]);

            case 'sql':
                return $this->response = $this->response
                    ->withCharset('UTF-8')
                    ->withFile($sqlFilePath, [
                        'download' => true,
                        'name' => $filename
                    ]);

            // build a view with all persons and companies if
            // the format is json or xml
            default:
                $this->loadModel('Persons');
                $this->loadModel('Companies');

                $persons = $this->Persons->find()
                    ->contain([
                        'LdhRanks',
                        'MilitaryStatuses',
                        'SocialStatuses',
                        'OccupationStatuses',
                        'Addresses.Streets.Arrondissements',
                        'ExternalReferences.ReferenceTypes',
                        'OriginalReferences',
                        'ProfCategories',
                        'Companies'
                    ]);


                $companies = $this->Companies->find()
                    ->contain([
                        'Persons',
                        'Addresses.Streets.Arrondissements',
                        'ExternalReferences.ReferenceTypes',
                        'OriginalReferences',
                        'ProfCategories'
                    ]);

                // Set the options for the view
                $this->set(compact('persons', 'companies'));
                $this->viewBuilder()->setClassName($formats[$format]);
                $this->viewBuilder()->setOption('serialize', true);
                $this->viewBuilder()->setOption('rootNode', 'results');

                // Set content-disposition header to force download instead of rendering a view
                $this->response = $this->response
                    ->withCharset('UTF-8')
                    ->withHeader('Content-Disposition', 'attachment; filename="'.$filename.'"');
        }
    

    }}





