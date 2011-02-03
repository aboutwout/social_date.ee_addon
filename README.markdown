# Social Date

Create relative dates in either the past or the future.

## Info

Developed by Wouter Vervloet, http://www.baseworks.nl/

Ported to EE 2.x and prepared for localization by Aaron Gustafson, http://easy-designs.net

## Usage

The date given in the date parameter can be in any format as well as in the past or future.

    {exp:social_date date='{expiration_date}'} // outputs: 'in about 1 day'
    {exp:social_date date='next monday'} // outputs: 'in about 2 days'
    {exp:social_date date='1272660359'}	// output: '2 hours ago'

    {exp:social_date}{entry_date}{/exp:social_date} // also available as a tag pair
    
