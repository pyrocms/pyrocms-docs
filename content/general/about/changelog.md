# Changelog

## 2.0.1 - January 24, 2012

### New Features

* Added Indonesian Language

### Bug Fixes

* Fixed issue where a user's session would be randomly dropped 
* Fixed column display issue for Widgets module
* Fixed some display issues for IE8
* Fixed some positioning and subfolder dropdown style issues in the Files module
* Fixed PHP notices when the navigation plugin is used as a tag pair
* Fixed a bug where a user with permission to access the Newsletters module and not the Users module, would see a "Manage Users" link in the CP nav bar
* 
* [Pro] Fixed an issue with the MSM that didn't record the correct migration version when creating a new site
* [Pro] Removed incorrect line in license that stated you could not remove the PyroCMS logo from PyroCMS Professional

### For Developers

* Added HTML5 Shim to the control panel
* Removed users_m in favor of user_m in the Users module
* Disabled persistent database connections by default