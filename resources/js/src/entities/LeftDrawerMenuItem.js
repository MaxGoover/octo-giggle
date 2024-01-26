/**
 * @property {string}      codename
 * @property {string}      icon
 * @property {string}      permissions
 * @property {string}      route
 * @property {string}      title
 */
export class LeftDrawerMenuItem {
  // codename
  // icon
  // permissions
  // route
  // title

  constructor(title, route, icon, codename, permissions) {
    this.title = title
    this.route = route
    this.icon = icon
    this.codename = codename
    this.permissions = permissions
  }
}
