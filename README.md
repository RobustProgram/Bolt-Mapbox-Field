# Mapbox implementation for Bolt CMS

#### Version 0.1.0

This extension allows for users to use Mapbox as an alternative to the Google
maps geolocation.

In order to use this, the user must add their Mapbox API key to the config
file as shown,

```
mapbox_api_key: (Your key here)
```

To add the geolocation field, you just need to add the following field to a
contenttype as shown,

```
content_type:
    fields:
        mapboxfield:
            type: RPMapboxField
            label: Location
            longitude: xx.xx
            latitude: xx.xx

```

The `type` field must be labeled as `RPMapboxField`. The current build allows
for three parameters, the ability to set the `label` and the ability to set the
default map view via the `longitude` and `latitude` fields.

To access the saved data in the front-end, you can use
`{{ mapboxfield.address }}` to get the written address and use
`{{ mapboxfield.longitude }}`, `{{ mapboxfield.latitude }}` to get the address's
respective longitude and latitude. Replace the name `mapboxfield` with the name
you provided for the content_type.

#### MIT License
