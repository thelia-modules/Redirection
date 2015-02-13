# Redirection module for Thelia

This module add the possibility de create 301 redirections from the back office for Thelia 2.1

## Installation

### Manually

* Copy the module into ```<thelia_root>/local/modules/``` directory and be sure that the name of the module is [Put your module name here. ex : TheliaSmarty].
* Activate it in your thelia administration panel

### Composer

Add it in your main thelia composer.json file

```
composer require thelia/redirection-module:~1.0
```

## Usage

Go on your back office and activate the module. Refresh the page then you can use the "manage redirections" link in the Tools dropdown.

## Hook

The module uses the hook ```main.top-menu-tools``` to show the link to the redirection management table.

## Loop

permanent-redirection

### Input arguments

|Argument |Description |
|---      |--- |
|id | A permanent redirection ID. |
|visible | "yes" if you only want online redirections, "no" for offline and * for both |
|position | Filter by position. |
|order | Sort the results. Possible values: "id", "id-reverse", "visible", "visible-reverse", "manual", "manual-reverse", "path", "path-reverse", "destination", "destination-reverse", "title", "title-reverse", "chapo", "chapo-reverse". |

### Output arguments

|Variable   |Description |
|---        |--- |
|$ID    | The redirection ID |
|$VISIBLE    | 1 if the redirection is online, 0 for offline |
|$POSITION    | The redirection position |
|$PATH    | The redirection path |
|$PATH    | The redirection path |
|$DESTINATION    | The redirection destination |
|$TITLE    | The redirection title |
|$CHAPO    | The redirection chapo |

### Exemple

```smarty
{loop type="permanent-redirection" name="permanent-redirection" order="visible,position"}
    <!-- ... -->
{/loop}
```
