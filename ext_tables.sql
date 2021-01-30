#
# Table structure for table 'tx_calendarize_domain_model_event'
#
CREATE TABLE tx_calendarize_domain_model_event (
    organizer_address int(11) NOT NULL DEFAULT '0',
    location_address int(11) NOT NULL DEFAULT '0'
);

#
# Table structure for table 'tx_calendarize_domain_model_event_location_mm'
#
CREATE TABLE tx_calendarize_domain_model_event_location_mm (
    `uid_local` int(11) NOT NULL DEFAULT '0',
    `uid_foreign` int(11) NOT NULL DEFAULT '0',
    `sorting` int(11) NOT NULL DEFAULT '0',
    `sorting_foreign` int(11) NOT NULL DEFAULT '0',
    KEY uid_local (uid_local),
    KEY uid_foreign (uid_foreign)  
);

#
# Table structure for table 'tx_calendarize_domain_model_event_organizer_mm'
#
CREATE TABLE tx_calendarize_domain_model_event_organizer_mm (
    `uid_local` int(11) NOT NULL DEFAULT '0',
    `uid_foreign` int(11) NOT NULL DEFAULT '0',
    `sorting` int(11) NOT NULL DEFAULT '0',
    `sorting_foreign` int(11) NOT NULL DEFAULT '0',  
    KEY uid_local (uid_local),
    KEY uid_foreign (uid_foreign)  
);

#
# Table structure for table 'tx_calendarize_domain_model_pluginconfiguration'
#
CREATE TABLE tx_calendarize_domain_model_pluginconfiguration (
    `location_pid` int(11) NOT NULL DEFAULT '0',
    `organizer_pid` int(11) NOT NULL DEFAULT '0',
);
