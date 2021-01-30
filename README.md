# Typo3 Extension `calendarize_address`
## Introduction
- Extends **Typo3 Calendar extension `calendarize`** with location and organizer records based on popular **Typo3 Address extension `tt_address`**
- Includes adapted event detail view for calendarize extension
- Provides new location view with address details and related events. Optionally a Google Maps visualisation of the location is possible.
- Provides new organizer view with address details and related events

## Administration

### Prerequisites
The following prerequisites must be fulfilled to use `calendarize_address` extension
1. `calendarize` extension is installed, see https://extensions.typo3.org/extension/calendarize/
2. `tt_address` extension is installed, see https://extensions.typo3.org/extension/tt_address/
3. _optionally_: get an API key from Google, if Google Maps visualisation should be used, see https://developers.google.com/maps/documentation/javascript/get-api-key 

### Installation
The extension needs to be installed as any other extension of TYPO3 CMS. Get the extension
1. **Get it from the Extension Manager:** Press the _Retrieve/Update_ button and search for the extension key `calendarize_address` and import the extension from the repository.
2. **Get it from typo3.org:** You can always get current version from https://extensions.typo3.org/extension/calendarize_address/ by downloading either the t3x or zip version. Upload the file afterwards in the Extension Manager.

The extension ships some TypoScript code which needs to be included.
1. Switch to the root page of your site.
2. Switch to the **Template module** and select _Info/Modify_.
3. Press the link **Edit the whole template record** and switch to the tab _Includes_.
4. Select **Calendarize - Address Extension** at the field _Include static (from extensions)_.

## Users Manual
### Creating Address Records
All existing address records can be reused in the events. To create new address records:
1. Switch to the **list view**
   1. Create a new page with type **Sysfolder** or
   2. Select an existing page
2. Click the _“+” icon_ and select _Address_.
3. Fill out all information you need and save.

### Creating Event Records including Locations or Organizers
All existing event records can be extended with locations or organizers based on address records. To create a new event and reference locations or organizers:
1. Switch to the **list view**
   1. Create a new page with type **Sysfolder** or
   2. Select an existing page
2. Click the _“+” icon_ and select _"Event"_.
3. To add an address record as **location** to the event, go to the field _Location from Addresses_ and select one ore more address records
4. To add an address record as **organizer** to the event, go to the field _Organizer from Addresses_ and select one ore more address records
5. Fill out other information you need and save.

### Creating a Plugin Content Element
For location view and organizer view two separate pages with separate plugins are required - in addition to other pages for e.g. list and detail view. Recommended page structure and corresponding plugins / views:

    List           (use normal Calendarize plugin with Calendar->list view)
    -- Detail      (use normal Calendarize plugin with Calendar->detail view)
    -- Month       (use normal Calendarize plugin with Calendar->month view)
    -- Day         (use normal Calendarize plugin with Calendar->day view)
    -- ... 
    -- Location    (use Calendarize Location view plugin (A))
    -- Organizer   (use Calendarize Organizer view plugin (B))

**(A) Location View:**
1. Switch to the **page view**
   1. Create a new page for the location view or
   2. Select an existing page where you want to insert the location view
2. Create a **new content element** and in the _“new content element wizard”_ scroll down to the _plugins_ section and select _"Calendarize - Location View"_
3. Switch to the **Plugin** tab, select _"Calendarize location view"_ in the _"Selected Plugin"_ field, configure the sysfolder where event records are stored and save.

**(B) Organizer View:**
1. Switch to the **page view**
   1. Create a new page for the organizer view or
   2. Select an existing page where you want to insert the organizer view
2. Create a **new content element** and in the _“new content element wizard”_ scroll down to the _plugins_ section and select _"Calendarize - Organizer View"_
3. Switch to the **Plugin** tab, configure the sysfolder where event records are stored and save.

**Activation and Template Configuration**
To finally activate the links from event detail view to location and organizer view, please configure the page ids:
1. Switch to the root page of your site.
2. Switch to the **Template module** and select _"Constant Editor"_.
3. Select **"Calendarize"** in the field _"Category"_.
4. Fill in the page id of (A) in the field locationPid.
5. Fill in the page id of (B) in the field organizerPid.
6. *Optionally*: add your Google Maps API key to enable maps in location view.
7. Save the template and **go to the frontend** to verify if event detail page, location view and organizer view are working as expected. When you click on a location or organizer entry in the event detail view, the location resp. organizer details are shown.

## Configuration

### Routing
If routing is required for location or organizer records, the following configuration will provide a good start for your configuration.

	  CalendarizeLocation:
		type: Extbase
		limitToPages:
		  - 10 <= INSERT HERE ID OF PAGE A
		namespace: tx_calendarize_location
		routes:
		  - routePath: '/{calendarize_location}'
			_controller: 'Address::location'
			_arguments:
			  calendarize_location: 'location'
			requirements:
			  calendarize_location: '\d'
		defaultController: 'Address::location'
		aspects:
		  calendarize_location:
			type: PersistedAliasMapper
			tableName: tt_address
			routeFieldName: slug
	  CalendarizeOrganizer:
		type: Extbase
		limitToPages:
		  - 11 <= INSERT HERE ID OF PAGE B
		namespace: tx_calendarize_organizer
		routes:
		  - routePath: '/{calendarize_organizer}'
			_controller: 'Address::organizer'
			_arguments:
			  calendarize_organizer: 'organizer'
			requirements:
			  calendarize_organizer: '\d'
		defaultController: 'Address::organizer'
		aspects:
		  calendarize_organizer:
			type: PersistedAliasMapper
			tableName: tt_address
			routeFieldName: slug