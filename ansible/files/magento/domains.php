<?php

/* super globals, we have to have them defined this way so that they are visible in static methods too
 * 
 * the way to access the variables is this:
 *
 * $productionDomains = aaSuperGlobals::$productionDomains;
 * 
 */
class aaSuperGlobals {
    // production domains
    public static $productionDomains = array(
        'www.alexandalexa.com',
        'usa.alexandalexa.com',
        'eu.alexandalexa.com',
        'store.alexandalexa.com',
        'sa.alexandalexa.com',
        'admin.alexandalexa.com',
        '{{ host_magento }}'
    );

    // us domains
    public static $usDomains = array(
        'usa.alexandalexa.com', # Live site
        'usa-{{ host_magento }}'
    );

    // eu domains
    public static $euDomains = array(
        'eu.alexandalexa.com', # Live site
        'eu-{{ host_magento }}'
    );
    
    // International domains
    public static $worldDomains = array(
        'store.alexandalexa.com', # Live site
        'store-{{ host_magento }}'
    );
    // Arabia domains
    public static $saDomains = array(
        'sa.alexandalexa.com', # Live site
        'sa-{{ host_magento }}'
    );
    
    // Hostnames
    public static $hostNames = array(
        '449345-app1.alexandalexa.com', # Live site
    );
    
}
    // backward compatibility with the the rest of the code accessing these variables via standard $GLOBALS or global identifier
    $productionDomains =& aaSuperGlobals::$productionDomains;
    $usWebsiteDomains =& aaSuperGlobals::$usDomains;
    $euWebsiteDomains =& aaSuperGlobals::$euDomains;
    $worldWebsiteDomains =& aaSuperGlobals::$worldDomains;
    $saWebsiteDomains =& aaSuperGlobals::$saDomains;
    $hostNames =& aaSuperGlobals::$hostNames;
