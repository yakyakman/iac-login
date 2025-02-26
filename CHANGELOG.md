# IAC Login Changelog

## [1.1.2](https://github.com/yakyakman/iac-login/releases/tag/1.1.2/)
Release Date: 26 Feb 2025

### Fixed
- Fix version in plugin header.

## [1.1.1](https://github.com/yakyakman/iac-login/releases/tag/1.1.1/)
Release Date: 26 Feb 2025

### Fixed
- Update composer dependencies and `vendor` dir.

## [1.1](https://github.com/yakyakman/iac-login/releases/tag/1.1/)
Release Date: 26 Feb 2025

### Added
- Drop-in `maintenance.php`. IAC branded maintenance mode page.

### Changed
- Style - show favicon on toolbar site ID.
- Style - override CMB2/WPHelper styling.

### Internal
- Connect to github repo.
- PluginCore update-checker.
- Github workflow action - create release on tag push.
- Add `wph-required-plugins.json`. Require plugin `notice-manager`.

## 1.0
Release Date: 2 Oct 2024

### Fixed
- Fix css height:98% "Scrollbar fix" in `wp-auth-check` iframe.

### Changed
- IAC Admin stylesheet - All labels are "clickable" (pointer: cursor).

### Dependencies
- Composer config: `prepend-autoloader: false` - Give precedence to other composer installations if present.

## 0.4
Release Date: 15 May 2024

### Added
- Add custom IAC stylesheet to all admin pages.

## 0.3
Release Date: 9 Mar 2024

### Added
- Autoload dependencies if available.
- Bail early if missing dependencies.

## 0.2
Release Date: 8 Sep 2023

### Added
- Add IAC Branding to login page.

