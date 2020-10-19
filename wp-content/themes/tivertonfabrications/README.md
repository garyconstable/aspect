# AMI Boilerplate Theme

This theme uses grunt as a task runner to watch and build the SCSS files and JS files , It minifies both and sends them to the "static" within the theme. To edit any of the styling or JS you need to edit the scss files in the scss folder or the js files in the js folder. 

## Installing the Theme

Install this theme as you would any other, This theme should prompt you to install all required plugins on activation - once installed it should automatically activate all of them too.


## Working on / Modifying the Theme

If you need to edit / work on this theme you will need to pull down the dependencies

To pull down all the dependencies for this site e.g Bootstrap , slick etc you will need you have node.js & yarn installed on your machine.

(if you dont have Yarn you can use NPM if you already have this on your machine but I would personally recommend using Yarn)

In the root of the wordpress installation edit the line - define( 'WP_DEBUG', false ); change the value to true - ( If you wish to use the symfony style debugger which is great for analyzing arrays run `composer install` )

Once Node & Yarn have been installed - or if you already have it installed run

In the terminal in the root of the theme run `yarn install`

Once this has run and completed in the terminal then run `grunt` (leave this terminal open with "grunt" running )This will run the task manager / preprocessor and watch the files.

You will see in the terminal that when you make any changes in any of the files in the scss or js folders the task runner will minify and re-compile the files on the fly

Once the theme has installed along with the plugins 

- take the ACF Pro plugin from the "lib/plugins" and upload it to the theme - then active the license - Email George / Or Slack him george@amiweb.co.uk for the key.
- take the json file from the 'lib/json' and import it into the admin - "/wp-admin/edit.php?post_type=acf-field-group&page=acf-tools" - (This will create siome back option functionality in the admin)


## What's here?

`static/` is where you can keep your static front-end scripts, styles, or images. In other words, your Sass files, JS files, fonts, and SVGs would live here.

`templates/` contains all of your Twig templates. These pretty much correspond 1 to 1 with the PHP files that respond to the WordPress template hierarchy. At the end of each PHP template, you'll notice a `Timber::render()` function whose first parameter is the Twig file where that data (or `$context`) will be used. Just an FYI.

`bin/` and `tests/` ... basically don't worry about (or remove) these unless you know what they are and want to.

## Other Resources

Any questions regarding this theme please email george@amiweb.co.uk or slack me :)