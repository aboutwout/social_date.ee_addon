# Social Date

Auto Expire adds the ability to any weblog to automatically expire new entries. It adds a predefined amount of time to the entry date. If an expiration date has already been set, that date will be used as the expiration date.

## Info

Developed by Wouter Vervloet, http://www.baseworks.nl/

This version of Social Date is developed for ExpressionEngine 1.6.x

## Usage

The date given in the date parameter can be in any format as well as in the past or future.

    {exp:social_date date='{expiration_date}'}
    {exp:social_date date='next monday'}
    {exp:social_date date='1272660359'}
    
