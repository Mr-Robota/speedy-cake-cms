speedy-cake-cms
===============

SpeedyCake allows you to create a CMS with CakePHP.

<h2>Requirements</h2>

HTTP Server. For example: Apache.
PHP 5.2.8 or greater.
CakePHP 2.5.1+

<h2>Dependencies</h2>

- Twitter Bootstrap 2.3.2
- jQuery 1.10.2
- jCrop 0.9.12
- CKeditor 4

<h2>Installation</h2>

- compiles the database file in app/Config/database.php (the name must be "default")
- compiles the email file in app/Config/email.php (the name must be "default")
- create "backups" e "uploads" folder in app/webroot/files
- upload (and overwrite) the "Controller" folder in the /app folder
- upload (and overwrite) the "Locale" folder in the /app folder
- upload (and overwrite) the "View" folder in the /app folder
- upload (and overwrite) the "webroot" folder in the /app folder
- copy the configuration variables from SpeedyCake/Config/bootstrap.php to /app/Config/bootstrap.php
- Edit the configuration variables
- copy the urls from SpeedyCake/Config/routes.php to /app/Config/routes.php
- open your website url (http://your_website) via browser and install the CMS

<h3>For use of custom fields in the template</h3>

<?php if ($this->SpeedyCake->ifExists('pagefields')) { ?>

&lt;p&gt;User: <?php echo $this->SpeedyCake->getCustomField($row['Page']['id'],'page','user'); ?>&lt;/p&gt;

<?php } ?>

<?php if ($this->SpeedyCake->ifExists('articlefields')) { ?>

&lt;p&gt;Author: <?php echo $this->SpeedyCake->getCustomField($row['Article']['id'],'article','author'); ?>&lt;/p&gt;

<?php } ?>
