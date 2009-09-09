<?php
        ///////////////////////////////
        // Define the Application Class
        ///////////////////////////////
        /**
         * The Application class is an abstract class that statically provides
         * information and global utilities for the entire web application.
         *
         * Custom constants for this webapp, as well as global variables and global
         * methods should be declared in this abstract class (declared statically).
         *
         * This Application class should extend from the ApplicationBase class in
         * the framework.
         */
        class QApplication extends QApplicationBase {
            public static $User;
            /**
             * This is called by the PHP5 Autoloader.  This method overrides the
             * one in ApplicationBase.
             *
             * @return void
             */
            public static function Autoload($strClassName) {
                // First use the QCubed Autoloader
                if (!parent::Autoload($strClassName)) {
                    // TODO: Run any custom autoloading functionality (if any) here...
                }
            }

            ////////////////////////////
            // QApplication Customizations (e.g. EncodingType, etc.)
            ////////////////////////////
            public static $EncodingType = 'UTF-8';

            ////////////////////////////
            // Additional Static Methods
            ////////////////////////////
            // TODO: Define any other custom global WebApplication functions (if any) here...
        }

        // Register the autoloader
        spl_autoload_register(array('QApplication', 'Autoload'));
