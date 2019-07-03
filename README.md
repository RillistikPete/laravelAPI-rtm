# GitHub Repository Search

This application uses the GitHub API to return and display repositories based on search criteria entered by the user. 
It can show the most popular language and the number of repos containing your criteria.  It can also search and sort repositories by the highest number of stars.

To get started, follow these steps:

### Pre-requisites:
To run this application, you should have [Git](https://git-scm.com/downloads) installed.  Running Laravel locally requires [Laravel 5.8](https://laravel.com/docs/5.0/installation) the use of virtualization.  My machine is running [Vagrant v2.2.5](https://www.vagrantup.com/downloads.html).  I recommend using [Laravel/Homestead](https://laravel.com/docs/5.8/homestead) with [Virtual Box](https://www.virtualbox.org/wiki/Downloads). The benefit to using Homestead is that it does not require an update when your operating system is updated. Using XAMPP, for example, does.  Also install [Composer](https://getcomposer.org/download/) to have a dependency manager for Laravel.

### Supplemental Configuration
> Note: Instructions are for Mac only. See 
> [Homestead for Windows](https://tutsforweb.com/installing-laravel-homestead-on-windows-step-by-step/) for more information.

### Add IP to hosts

Navigate to ```/etc/hosts``` in terminal.

Add your virtualization IP address to this file. Make sure it aligns properly with the other IPs. Name the IP "githubapp.test".

Navigate to the directory where you installed Homestead and type:
```ls -la```

Make sure your -vagrant.d user is your username, not "root", or you will not have permissions.

Open and edit your Homestead.yaml file:
```sudo nano Homestead.yaml``` and create map to the folder you wish to be the location of your Homestead projects:
```
folders:
    - map: ~/code
      to: /home/vagrant/code

sites:
    - map: githubapp.test
      to: /home/vagrant/code/githubapp/public
```
This will allow you to serve the application on a specific IP in the browser with the name 'githubapp.test'

##### Additional steps ONLY if using XAMPP:
Navigate to
```/etc/apache2/httpd.conf```
and uncomment '#Virtual Hosts'

Navigate to and edit
```/etc/apache2/extra/httpd-vhosts.conf```
Create a virtual host tag for the app, providing the location of the app in your Homestead directory:
```
<VirtualHost *:80>
    DocumentRoot "/home/vagrant/code/githubapp/public"
    ServerName githubapp.test
</VirtualHost>
```


### To Clone:
Navigate in terminal to the folder you specify in your Homestead.yaml file:  (Code / app-directory)

```git clone <clone url>```

Virtualization:
In the same directory:

```vagrant up```

```vagrant ssh```

Open browser and type 'githubapp.test'

#### Alternative Setup
Navigate to the folder you specify in your Homestead.yaml file:  (Code / app-directory)

```git clone <clone url>```

```php artisan serve```

This will run the app locally on host server.

## Instructions for Use:
You will be presented with the home page, where you can click the "Search Repos" button.
This will take you to the repository search page.  Here, you can search repositories based on keywords/criteria that you type into the search bar.
#### To search:
Type in your desired input and click "Search" button.
#### To sort your search by code language:
Type in your desired input and click "Sort By Language Search" button.
#### To sort your search by number of stars (greatest to least):
Type in your desired input and click "Sort By Stars" button.

#### Note:
If you encounter an error, refresh the page and try again.  The async function may not have been triggered on your click.

## Fun Example:
Type the word "interesting" into the search bar. Click "Sort By Stars" button.  See the results :)


Please contact me for questions: [petegavin.co](http://petegavin.co/)

