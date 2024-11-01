# SweepPress Pro

## Changelog

### Version: 6.1 / october 24, 2024

* **new** tested and compatible with `PHP` 8.4 RC 2
* **new** do action when deleting options with information about the deletion
* **new** [PRO] do action when deleting sitemeta with information about the deletion
* **new** [PRO] do action when deleting metadata with information about the deletion
* **edit** [PRO] few more changes to the Pro code organization
* **edit** [PRO] improved code organization for sitemeta handling
* **edit** [PRO] improved code organization for metadata handling

### Version: 6.0 / october 8, 2024

* **new** tested and compatible with `PHP` 8.4 RC 1
* **new** [PRO] backup data into `SQL` export file before removal
* **new** [PRO] backup data supports most of the sweepers
* **new** [PRO] backup data supports options and sitemeta management
* **new** [PRO] backup data supports metadata management
* **new** [PRO] backup data can export to compressed GZIP or BZIP2 formats
* **new** [PRO] sweep backups panel for managing export SQL files
* **new** [PRO] sweep backups panel includes an option to download exports
* **new** [PRO] metadata panels to preview duplicated meta records
* **new** [PRO] sweeper panel shows the links to preview data for some sweepers
* **new** [PRO] each sweeper supporting backup shows the archive flag
* **new** [PRO] settings panel to control the Backup Data feature
* **new** [PRO] admin bar settings to enable more sweepers for a quick sweep menu
* **new** [PRO] metadata management panels show an option to clear cache
* **new** [PRO] uses `mysqldump` library v2.12 to create export files
* **new** sweeper: bbpress orphaned replies
* **new** sweeper: unused terms by taxonomy
* **new** sweeper: term relationships taxonomy orphans
* **new** sweeper: term relationships objects orphans
* **new** sweeper: remove postmeta duplicated records
* **new** sweeper: remove commentmeta duplicated records
* **new** sweeper: remove termmeta duplicated records
* **new** sweeper: remove usermeta duplicated records
* **new** options management: subpanel quick cleanup tasks
* **new** options management: filter by the autoload status
* **new** options management: bulk enable/disable of autoload
* **new** options management: filter options by any known source
* **new** options, sitemeta and metadata: use centralized `Removal` class
* **new** options, sitemeta and metadata: deletion support simulation mode
* **new** options, sitemeta and metadata: support logging queries
* **new** expanded `Sweepers` panel to show the status of Backup flag
* **new** expanded sweeper objects with the backup flag
* **new** sidebar banner to show if the simulation mode is active
* **new** option to control days to keep notices on `Sweep` panel
* **new** dashboard database statistics show the percentage of free space
* **edit** [PRO] expanded list of supported plugins for CRON jobs detection
* **edit** [PRO] the Pro version CSS code moved into an own file
* **edit** [PRO] the Pro version JavaScript code moved into an own file
* **edit** improvements to the display of the autoload options
* **edit** modernized the JavaScript code to use arrow functions
* **edit** optimized JavaScript code making the files smaller
* **edit** many improvements to the options, sitemeta and metadata handling
* **edit** expanded list of supported plugins in `Storage` for detection
* **edit** changed the auto sweep flag for several sweepers
* **edit** optimizations to the code used to delete options
* **edit** various improvements and changes to the `Removal` class
* **fix** various small issues with the styling on Sweep panel
* **fix** options panel actions to enable/disable autoload not working
* **fix** hardcoded database table names in Terms AMP Errors sweeper
* **fix** option to show days to keep for sweepers not working
* **fix** several small typos or wording issues in the options descriptions
* **fix** several broken links to the Knowledge Base

### Version: 5.5 / september 11, 2024

* **new** sweep panel option to clear estimation cache
* **new** for each sweeper shows `Refresh` link to reload
* **new** show the limit of the days to keep for affected sweepers
* **new** CRON jobs identification can use regular expressions
* **edit** expanded detection list for CRON jobs
* **edit** many improvements to the PHP code structure
* **edit** improvements to the CRON jobs display
* **edit** few optimizations in the main JavaScript file
