# Views Work plugin for Craft CMS 5.x

*ABANDONED* Unfortunately, we are not able to support this plugin anymore.
Feel free to fork this code for your own purposes.
We changed the license to MIT license jan 5th 2024 so there are no license limitations.

This fork updates the abandoned plugin for Craft CMS 5 compatibility. It has
not been tested yet.

----

This branch is compatible with Craft CMS 5 only. It is not intended to
install or run on Craft CMS 4.

---
Please view the full documentation at [io.24hoursmedia.com](https://io.24hoursmedia.com/views-work)!

----

* Track pageviews by day, week, month or grand total
* View popular entries in a widget
* Get popular entries and pageviews on the front-end in twig
* Uses a signed tracking image to register only real page views

## Usage

Show a beacon 1px x 1px image to register a pageview:

```
{# render the image for registration #}
{{ entry | views_work_image }}
```

Get popular items:
```
{% set entries = craft.entries.section('articles').orderByPopular('week', 1).limit(10) %} %}

{# show this weeks views (also supported: today, thisMonth, total) #}
{{ entries.viewsWork.thisWeek }}

```

## GraphQL

Views Work fields expose their counters in Craft's GraphQL schema. Add a
Views Work field to an entry type, make sure the entry type is available to
your GraphQL schema, and query the field by its handle:

```graphql
query ViewsWorkEntries {
  entries(section: "articles") {
    ... on articles_Entry {
      title
      viewsWork {
        total
        thisMonth
        thisWeek
        today
      }
    }
  }
}
```

## Resetting view counters

Some view counters need to be periodically reset (such as the daily and
weekly counters). You can either do this with a special url
(provided in the control panel), or by setting up a cron job or using a
special url.

### Resetting views with a cron job

Execute this cron at an approprate time, i.e. once every day at 00:01 pm.  
It resets the daily, weekly and monthly view counters.  

The cron checks wether it is the first day of the week or month before resetting monthly or weekly views.

    ./craft views-work/default/reset-views



### Screenshots

![views-work-dashboard.png](resources/img/views-work-dashboard.png)

![settings-screen-v1.3.png](resources/img/settings-screen-v1.3.png)

![views-work-widgets.png](resources/img/views-work-widgets.png)

----

Brought to you by [24hoursmedia](https://www.24hoursmedia.com)

Logo by https://www.iconfinder.com/ReactiveDoodlesApp
