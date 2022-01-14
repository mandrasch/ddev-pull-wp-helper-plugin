Status: Work in progress, not ready for production!


![Screenshot](screenshot.png)

**Test in WordPress**

1. Archive `ddev-pull-wp-helper` as .zip
1. Upload to WordPress site & activate
1. Check Settings &raquo; DDEV Pull WP Helper

**Local testing**

1. Use wordpress quick start to setup a wp:
https://ddev.readthedocs.io/en/stable/users/cli-usage/#wordpress-quickstart
1. Install theme via dashboard or
`ddev wp plugin install --activate ddev-pull-wp-helper`

Reset:

- `git clean -fdx`
- delete DDEV project: `ddev delete -O`