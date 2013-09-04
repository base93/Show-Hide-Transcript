# Show transcript

A simple plugin that adds in a `[transcript] ... transcript content here ... [/transcript]`
shortcode to your WordPress install. By default the content is hidden, and a link is show, and
when clicked the transcript will slide out.

Based on the awesome [WordPress Plugin Boilerplate](https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate/).


## Installation
1) Download the zip file and upload to `/wp-content/plugins/`
2) Activate


## Modification
The plugin comes with its own styles, located in `/show-transcript/css/show-transcript.css`. There
are 3 CSS classes / IDs used, and they are:

1) `.transcript-toggle`
2) `.transcript-button `: Used to style the "show/hide transcript" button
3) `#sht-show-transcript `: Wraps the transcript itself.