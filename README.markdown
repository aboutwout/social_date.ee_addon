# Social Date

Create relative dates in either the past or the future.

## Info

Developed by Wouter Vervloet, http://www.baseworks.nl/

This version of Social Date is developed for ExpressionEngine 1.6.x

## Usage

The date given in the date parameter can be in any format as well as in the past or future.

    {exp:social_date date='{expiration_date}'} // outputs: 'in about 1 day'
    {exp:social_date date='next monday'} // outputs: 'in about 2 days'
    {exp:social_date date='1272660359'} // output: '2 hours ago'
    
