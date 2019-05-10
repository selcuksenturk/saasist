### Version 1.1.9 | Build 119
* Fixed an issue with Leads

### Version 1.1.7 | Build 117 | May 03, 2019
* The default config system is completely rewritten, so that update will not replace the configurations.
* Added Social sign on using Google. Facebook is coming soon. To enable, you will have to configure system/config/social_sign_on.php 


### Version 1.1.6 | Build 116 | April 03, 2019

* Added option to select module for each plan
* Added option to select plan for workspace from Super Admin
* Added option to support API. All business suite API is supported by SaaS.

### Version 1.1.5 | Build 115 | March 11, 2019

* Fixed an issue when creating Role
* Fixed an issue POS item listing

### Version 1.1.4 | Build 114 | March 7, 2019

* Invoice preview design improvements
* Added option to login to other workspace from Super Admin [ Super Admin -> Users : Then click login as user ]
* Improvements: If workspace is suspended, user will be redirected to Billing page after login instead of showing workspace is suspended
* Fixed an issue with stripe payment gateway
* Fixed an issue with Invoice reports, tasks & orders related to data listing
* Fixed an issue when editing product
* Fixed issue - "Back to client area" asking for login
* Added email settings under Super Admin Settings to configure SMTP, Mailgun etc.
* Recaptcha configuration will be shown only in Super Admin
* Fixed various other bugs

### Version 1.1.3 | Build 113 | March 1, 2019

* Language file improvement
* Fixed an issue when adding new Role

### Version 1.1.2 | Build 112 | February 25, 2019

* Payment gateway integration. Trial user will get a link to choose plan and upgrade & super admin can configure payment gateways from Settings - > Payment Gateways
* Added a new menu - "Billing" on top right corner for non super admin users.
* Fixed various bugs.
 
### Version 1.0.9 | Build 109 | February 18, 2019

* New redirect automatically from sign in page to dashboard if user is already logged in.
* Super Admin: added option for deleting workspace with all related data to this workspace.
* Added option to set first day of calendar. To set this go to Settings - > Localization
* Fixed various bugs

### Version 1.0.8 | Build 108 | February 10, 2019
* Added option to set Subscription status manually
* Added option to set Trial expires date manually
* Fixed issue with Adding Expense
* Added missing translation strings in many places
* Added separate config folder to set default config
* Fixed an issue when adding new Staff
* Fixed creating new ticket
* Fixed password manager notes is not showing