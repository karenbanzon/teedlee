# pd-hackathon-search

## Scope
1. Spell check
    * Similar to google
    * Display results for the spell checked query
    * Display a link to display the uncorrected query
    * Static page sample: _/spell-check.php_

2. Location detection
    * Done if a city / municipality name is detected in the query
    * Location is set to the city / municipality
    * City / municipality name is taken out of the query
    * Display an alert to let the user know what has been done and allow her to change the location of the search
    * Static page sample: _/location-detection.php_


3. Broad search
    * Displayed as a “related / similar ads” feed below the main results
    * Important if there are no results, still useful in other cases
    * Broad search options:
    * Broader location / search across entire Philippines
    * Move up to a higher level category / search across all categories
    * Similar keywords
    * Static page sample: _/broad-search.php (but also visible in other pages)_


4. Keyword learning
    * Displays keywords commonly used with the current query
    * Displayed as a set of buttons which append the keyword to the query when clicked
    * Static page sample: _/keyword-learning.php_


## Core pages
* Stickersheet - _/index.php_
* Home Page - _/home.php_


## Demo site
(TBA)


## Roles
**Arpee**
* Query handling and logic layer/s in between API and frontend

**Denise**
* Select sample word cloud of related keywords to “teach” to the platform
* UX review of interface

**Karen**
* Design user interface
* Provide sample cases
