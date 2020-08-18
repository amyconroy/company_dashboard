<?php
return [

    /**
     * You can generate API keys here: https://cloudconvert.com/dashboard/api/v2/keys.
     */

    'api_key' => env('CLOUDCONVERT_API_KEY', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNjU0ODhiYWFiMGNlODU3ODk5ZjA0MjU5MmNiNzE3ZjYxNjE5MWMwMTBjNTNmZGU1MDFmZTg4MmI1Y2Q3NWY4MDg2YTI5MzM3ZDkxODVmZjEiLCJpYXQiOjE1OTc2OTE1MTcsIm5iZiI6MTU5NzY5MTUxNywiZXhwIjo0NzUzMzY1MTE3LCJzdWIiOiI0NDI0MTM3NSIsInNjb3BlcyI6WyJwcmVzZXQud3JpdGUiLCJwcmVzZXQucmVhZCIsIndlYmhvb2sud3JpdGUiLCJ3ZWJob29rLnJlYWQiLCJ0YXNrLndyaXRlIiwidGFzay5yZWFkIiwidXNlci53cml0ZSIsInVzZXIucmVhZCJdfQ.hyVfVJVrL1aRFMz_88jPesNzYoqegWD5ptsukYl2AB-AYhjxQ9RiKioPQrvo7spD9YB-oCQSpEG-RqQ5s6RgOqGJ0-gBGRqP9ZgRSjWJbD8vT1r4ZZgtiJcok-AEgIVGIJpY5YS-l2mL8ZPjbDsSJs0AY3xnszzs3HQ_D5GmGPJ3lPd7TefR5RjHy73wU00EBGcMKYlJIfaiUPt4bOA77HYFFBJ9bGV8Zd_HlTNJp861yJIbG1z5eQPV_tCQ3Km_KGj38bAgNQpa9Me0vqZssSBfRsY_9Vyc-gYNslBAIsTYzi7xcRISg8qGil_W3VEhOLYl077sJ8FL02ME-FEOnSg2QSxwdUnOwqdCcmDZgs8Bc1RDG4wgBCpwkbhr7n5Wa6yt_phpdnmKKfm-QvrzAweXmhVSM1eLeWkrT4gvH8Qqn7ypPst1kiW7KPvE6mFn0GDj7BKxUcjJ-MHIHEOt1CoAL4wL0APL0VCwvvzGT4yGt5sj6HFS6KIpQytlwmH-mP9CWoWdxPiQjTd7cjvcFBkTK_K7jDy45yHvkwYMTRPmi4tt0owQnWwq6sXw7jQfkeQuvG0FHjNZhPykM7ivqRSMjErDshbUSYCZnv34HhuzFYPDLO1ZD3VifvcZ0lY_gO8rpzXDcbMuxWspOEQS0Nz27vfBOwGzbHnRvYchJ6o'),

    /**
     * Use the CloudConvert Sanbox API (Defaults to false, which enables the Production API).
     */
    'sandbox' => env('CLOUDCONVERT_SANDBOX', false),

    /**
     * You can find the secret used at the webhook settings: https://cloudconvert.com/dashboard/api/v2/webhooks
     */
    'webhook_signing_secret' => env('CLOUDCONVERT_WEBHOOK_SIGNING_SECRET', '')

];
