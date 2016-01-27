angular.module('templates-app', ['accounts/item/item.tpl.html', 'accounts/items/items.tpl.html', 'catalog/catalog.tpl.html', 'catalog/item/item.tpl.html', 'categories/categories.tpl.html', 'categories/item/item.tpl.html', 'children/item/item.tpl.html', 'children/items/items.tpl.html', 'coaches/item/coach.tpl.html', 'coaches/items/coaches.tpl.html', 'events/events.tpl.html', 'events/item/item.tpl.html', 'home/home.tpl.html', 'invoices/item/invoice.tpl.html', 'invoices/items/invoices.tpl.html', 'orders/item/item.tpl.html', 'orders/item/tpl/add/booking/subscription.tpl.html', 'orders/item/tpl/add/payment/paynow.tpl.html', 'orders/item/tpl/add/payment/recurring.tpl.html', 'orders/item/tpl/add/payment/subscription.tpl.html', 'orders/item/tpl/add/pricing/unitspercycle.tpl.html', 'orders/item/tpl/display/booking/subscription.tpl.html', 'orders/item/tpl/display/payment/paynow.tpl.html', 'orders/item/tpl/display/pricing/unitspercycle.tpl.html', 'orders/items/items.tpl.html', 'parents/item/item.tpl.html', 'parents/items/items.tpl.html', 'payments/item/item.tpl.html', 'payments/payments.tpl.html', 'products/item/event/item/item.tpl.html', 'products/item/event/items/items.tpl.html', 'products/item/item.tpl.html', 'products/items/products.tpl.html', 'registrations/item/item.tpl.html', 'registrations/items/items.tpl.html', 'reports/reports.tpl.html', 'rollcall/products/products.tpl.html', 'rollcall/rollcall.tpl.html', 'rollcall/roster/roster.tpl.html', 'subscriptions/item/item.tpl.html', 'subscriptions/items/items.tpl.html', 'transactions/item/transaction.tpl.html', 'transactions/items/transactions.tpl.html', 'users/item/item.tpl.html', 'users/users.tpl.html', 'venues/item/item.tpl.html', 'venues/items/venues.tpl.html']);

angular.module("accounts/item/item.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("accounts/item/item.tpl.html",
    "<md-toolbar>\n" +
    "    <div class=\"md-toolbar-tools\">\n" +
    "        <md-button class=\"md-icon-button\" aria-label=\"Settings\">\n" +
    "            <md-icon md-svg-icon=\"img/icons/menu.svg\"></md-icon>\n" +
    "        </md-button>\n" +
    "        <h2>\n" +
    "            <span>Account Detail</span>\n" +
    "        </h2>\n" +
    "        <span flex></span>\n" +
    "        <div>\n" +
    "            <md-button tooltip=\"Save Current Item State\"\n" +
    "                       tooltip-placement=\"left\"\n" +
    "                       class=\"md-icon-button\"\n" +
    "                       aria-label=\"Save\"\n" +
    "                       ng-click=\"Ctrl.saveItem()\">\n" +
    "                <md-icon><i class=\"material-icons\">check</i></md-icon>\n" +
    "            </md-button>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</md-toolbar>\n" +
    "<md-content>\n" +
    "    <div layout=\"row\" layout-align=\"space-around center\" flex>\n" +
    "        <div>\n" +
    "            <h3>ID:{{Ctrl.item.id}}</h3>\n" +
    "        </div>\n" +
    "        <div>\n" +
    "            <h3>Created:{{Ctrl.item.created * 1000  | date:'dd/MM/yyyy'}}</h3>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "\n" +
    "    <md-card layout-margin>\n" +
    "        <md-card-content>\n" +
    "            <md-toolbar>\n" +
    "                <div class=\"md-toolbar-tools\">\n" +
    "                    <h2>\n" +
    "                        <span>Parents</span>\n" +
    "                    </h2>\n" +
    "                    <span flex></span>\n" +
    "                    <md-button aria-label=\"Create Account\" ui-sref=\"parents.item({account:Ctrl.item.id})\">\n" +
    "                        <md-icon><i class=\"material-icons\">add_circle_outline</i></md-icon>\n" +
    "                    </md-button>\n" +
    "                </div>\n" +
    "            </md-toolbar>\n" +
    "            <md-subheader class=\"md-4-line\" >\n" +
    "                <div layout=\"row\" layout-align=\"space-around center\" flex>\n" +
    "                    <div flex=\"10\">Primary    </div>\n" +
    "                    <div flex=\"30\">Name     </div>\n" +
    "                    <div flex=\"30\">Email      </div>\n" +
    "                    <div flex>Phone      </div>\n" +
    "                </div>\n" +
    "            </md-subheader>\n" +
    "            <md-divider></md-divider>\n" +
    "            <md-list ng-if=\"Ctrl.item.parents.length\">\n" +
    "                <md-radio-group ng-model=\"Ctrl.selectedPrimaryParent\"\n" +
    "                                ng-model-options=\"{ getterSetter : true }\" >\n" +
    "                <md-list-item  class=\"md-3-line\" ng-repeat=\"parent in Ctrl.item.parents\">\n" +
    "                    <div flex=\"10\">\n" +
    "                        <md-radio-button class=\"md-primary\" ng-value=\"Ctrl.item.id\"></md-radio-button>\n" +
    "                    </div>\n" +
    "                    <div flex=\"30\">\n" +
    "                        <a ui-sref=\"parents.item({id:parent.id})\" >\n" +
    "                            <i class=\"fa fa-edit\"></i> {{parent.name}}\n" +
    "                        </a>\n" +
    "                    </div>\n" +
    "                    <div flex=\"30\">\n" +
    "                        {{parent.email}}\n" +
    "                    </div>\n" +
    "                    <div flex>\n" +
    "                        {{parent.phone_mobile}}\n" +
    "                    </div>\n" +
    "                </md-list-item>\n" +
    "            </md-list>\n" +
    "            <h1 ng-if=\"!Ctrl.item.parents.length\">No Parents To Display</h1>\n" +
    "            <md-divider class=\"md-3-line\"></md-divider>\n" +
    "        </md-card-content>\n" +
    "    </md-card>\n" +
    "    <md-card layout-margin flex>\n" +
    "        <md-card-content>\n" +
    "            <md-toolbar>\n" +
    "                <div class=\"md-toolbar-tools\">\n" +
    "                    <h2>\n" +
    "                        <span>Children</span>\n" +
    "                    </h2>\n" +
    "                    <span flex></span>\n" +
    "                    <md-button aria-label=\"Add Child\" ng-click=\"Ctrl.showAddChildForm()\">\n" +
    "                        <md-icon><i class=\"material-icons\">add_circle_outline</i></md-icon>\n" +
    "                    </md-button>\n" +
    "                </div>\n" +
    "            </md-toolbar>\n" +
    "\n" +
    "            <md-content layout-margin ng-if=\"Ctrl.addChildForm\" flex>\n" +
    "                <md-card>\n" +
    "                    <md-card-content>\n" +
    "                        <md-toolbar>\n" +
    "                            <div class=\"md-toolbar-tools\">\n" +
    "                                <h2>Edit Child</h2>\n" +
    "                                <span flex></span>\n" +
    "                                <md-button aria-label=\"Commit Child\" ng-click=\"Ctrl.commitChildForm()\">\n" +
    "                                    <md-icon><i class=\"material-icons\">check</i> </md-icon>\n" +
    "                                </md-button>\n" +
    "                                <md-button aria-label=\"Cancel Child\" ng-click=\"Ctrl.cancelAddChildForm()\">\n" +
    "                                    <md-icon><i class=\"material-icons\">cancel_circle_outline</i></md-icon>\n" +
    "                                </md-button>\n" +
    "                            </div>\n" +
    "                        </md-toolbar>\n" +
    "                        <md-input-container flex>\n" +
    "                            <label class=\"col-md-4 control-label\">Name</label>\n" +
    "                            <input type=\"text\" required  ng-model=\"Ctrl.newChild.name\">\n" +
    "                        </md-input-container>\n" +
    "                        <md-divider></md-divider>\n" +
    "                        <div>\n" +
    "                            <label class=\"col-md-4 control-label\">DOB</label>\n" +
    "                            <md-datepicker\n" +
    "                                    ng-model=\"Ctrl.newChild.dob\"\n" +
    "                                    ng-model-options=\"{ getterSetter: true }\"\n" +
    "                                    md-placeholder=\"Enter date\"></md-datepicker>\n" +
    "                        </div>\n" +
    "                    </md-card-content>\n" +
    "                </md-card>\n" +
    "            </md-content>\n" +
    "            <md-divider class=\"md-3-line\"></md-divider>\n" +
    "            <md-subheader class=\"md-4-line\" >\n" +
    "                <div layout=\"row\" layout-align=\"space-around center\" flex>\n" +
    "                    <div flex=\"40\">Name    </div>\n" +
    "                    <div flex=\"40\">Dob     </div>\n" +
    "                    <div flex>Remove      </div>\n" +
    "                </div>\n" +
    "            </md-subheader>\n" +
    "            <md-content layout-margin>\n" +
    "                <md-list ng-if=\"Ctrl.item.children.length\">\n" +
    "\n" +
    "                    <md-list-item  class=\"md-3-line\" ng-repeat=\"child in Ctrl.item.children\" flex>\n" +
    "                        <div  ng-click=\"Ctrl.editChild($index)\" flex=\"80\">\n" +
    "                            <div flex=\"40\">\n" +
    "                                {{child.name}}\n" +
    "                            </div>\n" +
    "                            <div flex=\"10\">\n" +
    "                                {{child.dob * 1000 | date:'shortDate'}}\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "\n" +
    "                        <div flex>\n" +
    "                            <md-button ng-click=\"Ctrl.removeChild($index)\">\n" +
    "                                <md-icon><i class=\"material-icons\">cancel_circle_outline</i></md-icon>\n" +
    "                            </md-button>\n" +
    "                        </div>\n" +
    "                    </md-list-item>\n" +
    "                </md-list>\n" +
    "                <h1 ng-if=\"!Ctrl.item.children.length\">No Children To Display</h1>\n" +
    "            </md-content>\n" +
    "        </md-card-content>\n" +
    "    </md-card>\n" +
    "    <md-card layout-margin>\n" +
    "        <md-card-content>\n" +
    "            <md-toolbar>\n" +
    "                <div class=\"md-toolbar-tools\">\n" +
    "                    <h2>\n" +
    "                        <span>Orders</span>\n" +
    "                    </h2>\n" +
    "                    <span flex></span>\n" +
    "                    <md-button aria-label=\"Add Order\" ui-sref=\"orders.item({account_id:Ctrl.item.id})\">\n" +
    "                        <md-icon><i class=\"material-icons\">add_circle_outline</i></md-icon>\n" +
    "                    </md-button>\n" +
    "                </div>\n" +
    "            </md-toolbar>\n" +
    "            <md-subheader class=\"md-4-line\" >\n" +
    "                <div layout=\"row\" layout-align=\"space-around center\" flex>\n" +
    "                    <div flex=\"10\">                 </div>\n" +
    "                    <div flex=\"20\">Created          </div>\n" +
    "                    <div flex>Source                </div>\n" +
    "                </div>\n" +
    "            </md-subheader>\n" +
    "            <md-list ng-if=\"Ctrl.item.orders.length\">\n" +
    "                <md-list-item  class=\"md-3-line\" ng-repeat=\"order in Ctrl.item.orders\">\n" +
    "                    <div flex=\"10\">\n" +
    "                        <a ui-sref=\"orders.item({id:order.id})\" >\n" +
    "                            <i class=\"fa fa-edit\"></i>\n" +
    "                        </a>\n" +
    "                    </div>\n" +
    "                    <div flex=\"20\">\n" +
    "                        {{order.created * 1000 | date:'dd/MM/yyyy'}}\n" +
    "                    </div>\n" +
    "                    <div flex>\n" +
    "                        {{order.source}}\n" +
    "                    </div>\n" +
    "                </md-list-item>\n" +
    "            </md-list>\n" +
    "            <h1 ng-if=\"!Ctrl.item.orders.length\">No Orders To Display</h1>\n" +
    "            <md-divider class=\"md-3-line\"></md-divider>\n" +
    "        </md-card-content>\n" +
    "    </md-card>\n" +
    "    <md-card layout-margin>\n" +
    "        <md-card-content>\n" +
    "            <md-toolbar>\n" +
    "                <div class=\"md-toolbar-tools\">\n" +
    "                    <h2>\n" +
    "                        <span>Subscriptions</span>\n" +
    "                    </h2>\n" +
    "                    <span flex></span>\n" +
    "                    <md-button aria-label=\"Add Subscription\" ui-sref=\"subscription.item\">\n" +
    "                        <md-icon><i class=\"material-icons\">add_circle_outline</i></md-icon>\n" +
    "                    </md-button>\n" +
    "                </div>\n" +
    "            </md-toolbar>\n" +
    "            <md-subheader class=\"md-4-line\" >\n" +
    "                <div layout=\"row\" layout-align=\"space-around center\" flex>\n" +
    "                    <div flex=\"10\">                 </div>\n" +
    "                    <div flex=\"40\">Product Name     </div>\n" +
    "                    <div flex>Bill Date             </div>\n" +
    "                </div>\n" +
    "            </md-subheader>\n" +
    "            <md-list ng-if=\"Ctrl.item.subscriptions.length\">\n" +
    "                <md-list-item  class=\"md-3-line\" ng-repeat=\"subscription in Ctrl.item.subscriptions\">\n" +
    "                    <div flex=\"10\">\n" +
    "                        <a ui-sref=\"subscription.item({id:subscription.id})\" >\n" +
    "                            <i class=\"fa fa-edit\"></i>\n" +
    "                        </a>\n" +
    "                    </div>\n" +
    "                    <div flex=\"40\">\n" +
    "                        {{subscription.product_id | productname:Ctrl.item.orders:subscription.order_id}}\n" +
    "                    </div>\n" +
    "                    <div flex>\n" +
    "                        {{subscription.bill_date}}\n" +
    "                    </div>\n" +
    "                </md-list-item>\n" +
    "            </md-list>\n" +
    "            <h1 ng-if=\"!Ctrl.item.subscriptions.length\">No subscriptions To Display</h1>\n" +
    "            <md-divider class=\"md-3-line\"></md-divider>\n" +
    "        </md-card-content>\n" +
    "    </md-card>\n" +
    "    <md-card layout-margin>\n" +
    "        <md-card-content>\n" +
    "            <md-toolbar>\n" +
    "                <div class=\"md-toolbar-tools\">\n" +
    "                    <h2>\n" +
    "                        <span>Registrations</span>\n" +
    "                    </h2>\n" +
    "                    <span flex></span>\n" +
    "                    <md-button aria-label=\"Add REgistration\" ui-sref=\"registration.item\">\n" +
    "                        <md-icon><i class=\"material-icons\">add_circle_outline</i></md-icon>\n" +
    "                    </md-button>\n" +
    "                </div>\n" +
    "            </md-toolbar>\n" +
    "            <md-subheader class=\"md-4-line\" >\n" +
    "                <div layout=\"row\" layout-align=\"space-around center\" flex>\n" +
    "                    <div flex=\"5\"></div>\n" +
    "                    <div flex=\"20\">Child Name       </div>\n" +
    "                    <div flex=\"40\">Product Name     </div>\n" +
    "                    <div flex=\"15\">Date Start       </div>\n" +
    "                    <div flex>Date End              </div>\n" +
    "                </div>\n" +
    "            </md-subheader>\n" +
    "            <md-list ng-if=\"Ctrl.item.registrations.length\">\n" +
    "                <md-list-item  class=\"md-3-line\" ng-repeat=\"registration in Ctrl.item.registrations\">\n" +
    "                    <div flex=\"5\">\n" +
    "                        <a ui-sref=\"registrations.item({id:registration.id})\" >\n" +
    "                            <i class=\"fa fa-edit\"></i>\n" +
    "                        </a>\n" +
    "                    </div>\n" +
    "                    <div flex=\"20\">\n" +
    "                        {{registration.child_id | childname:Ctrl.item.children}}\n" +
    "                    </div>\n" +
    "                    <div flex=\"40\">\n" +
    "                        {{registration.product_id | productname:Ctrl.item.orders:registration.order_id}}\n" +
    "                    </div>\n" +
    "                    <div flex=\"15\">\n" +
    "                        {{registration.date_start * 1000  | date:'dd/MM/yyyy'}}\n" +
    "                    </div>\n" +
    "                    <div flex>\n" +
    "                        {{registration.date_end * 1000  | date:'dd/MM/yyyy'}}\n" +
    "                    </div>\n" +
    "                </md-list-item>\n" +
    "            </md-list>\n" +
    "            <h1 ng-if=\"!Ctrl.item.registrations.length\">No registrations To Display</h1>\n" +
    "            <md-divider class=\"md-3-line\"></md-divider>\n" +
    "        </md-card-content>\n" +
    "    </md-card>\n" +
    "</md-content>\n" +
    "");
}]);

angular.module("accounts/items/items.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("accounts/items/items.tpl.html",
    "<md-sidenav class=\"md-sidenav-left md-whiteframe-z2\" md-component-id=\"left\" >\n" +
    "        <md-toolbar layout=\"row\">\n" +
    "            <div class=\"md-toolbar-tools\" ng-controller=\"LeftCtrl\" >\n" +
    "                <h1>Filters</h1>\n" +
    "                <span flex></span>\n" +
    "                <md-button ng-click=\"close()\" class=\"md-primary\" md-sidenav-focus>Close</md-button>\n" +
    "            </div>\n" +
    "\n" +
    "        </md-toolbar>\n" +
    "        <md-content layout=\"column\">\n" +
    "            <md-input-container flex>\n" +
    "                <label>State</label>\n" +
    "                <md-select aria-label placeholder=\"state\" ng-model=\"Ctrl.filters.state\">\n" +
    "                    <md-option ng-repeat=\"state in [{text:'current',value:1},{text:'archive',value:0}]\" value=\"{{state.value}}\">\n" +
    "                        {{state.text}}\n" +
    "                    </md-option>\n" +
    "                </md-select>\n" +
    "            </md-input-container>\n" +
    "            <md-input-container flex>\n" +
    "                <label>Status</label>\n" +
    "                <md-select placeholder=\"Status\" ng-model=\"Ctrl.filters.status\">\n" +
    "                    <md-option ng-repeat=\"status in Ctrl.statusOptions\" value=\"{{status.value}}\">\n" +
    "                        {{status.text}}\n" +
    "                    </md-option>\n" +
    "                </md-select>\n" +
    "            </md-input-container>\n" +
    "            <div ng-controller=\"ParentSearchCtrl as Ctrl\">\n" +
    "                <md-autocomplete\n" +
    "                    md-delay=\"500\"\n" +
    "                    ng-disabled=\"false\"\n" +
    "                    md-no-cache=\"false\"\n" +
    "                    md-selected-item=\"Ctrl.parent\"\n" +
    "                    md-search-text-change=\"Ctrl.searchTextChange(Ctrl.searchText)\"\n" +
    "                    md-search-text=\"Ctrl.searchText\"\n" +
    "                    md-selected-item-change=\"Ctrl.selectedItemChange(item)\"\n" +
    "                    md-items=\"item in Ctrl.querySearch(Ctrl.searchText)\"\n" +
    "                    md-item-text=\"item.f_name + ' ' + item.l_name\"\n" +
    "                    md-min-length=\"0\"\n" +
    "                    placeholder=\"Parent Name\">\n" +
    "                    <md-item-template>\n" +
    "                        <span md-highlight-text=\"Ctrl.searchText\" md-highlight-flags=\"^i\">{{item.f_name}} {{item.l_name}}</span>\n" +
    "                    </md-item-template>\n" +
    "                    <md-not-found>\n" +
    "                        No matches found.\n" +
    "                    </md-not-found>\n" +
    "                </md-autocomplete>\n" +
    "            </div>\n" +
    "            <div ng-controller=\"ParentMobilenumberSearchCtrl as Ctrl\">\n" +
    "                <md-autocomplete\n" +
    "                        md-delay=\"500\"\n" +
    "                        ng-disabled=\"false\"\n" +
    "                        md-no-cache=\"false\"\n" +
    "                        md-selected-item=\"Ctrl.parent\"\n" +
    "                        md-search-text-change=\"Ctrl.searchTextChange(Ctrl.searchText)\"\n" +
    "                        md-search-text=\"Ctrl.searchText\"\n" +
    "                        md-selected-item-change=\"Ctrl.selectedItemChange(item)\"\n" +
    "                        md-items=\"item in Ctrl.querySearch(Ctrl.searchText)\"\n" +
    "                        md-item-text=\"item.phone_mobile\"\n" +
    "                        md-min-length=\"0\"\n" +
    "                        placeholder=\"Mobile Number\">\n" +
    "                    <md-item-template>\n" +
    "                        <span md-highlight-text=\"Ctrl.searchText\" md-highlight-flags=\"^i\">{{item.phone_mobile}}</span>\n" +
    "                    </md-item-template>\n" +
    "                    <md-not-found>\n" +
    "                        No matches found.\n" +
    "                    </md-not-found>\n" +
    "                </md-autocomplete>\n" +
    "            </div>\n" +
    "            <div ng-controller=\"ChildSearchCtrl as Ctrl\" flex>\n" +
    "                <md-autocomplete\n" +
    "                        md-delay=\"500\"\n" +
    "                        ng-disabled=\"false\"\n" +
    "                        md-no-cache=\"false\"\n" +
    "                        md-selected-item=\"Ctrl.child\"\n" +
    "                        md-search-text-change=\"Ctrl.searchTextChange(Ctrl.searchText)\"\n" +
    "                        md-search-text=\"Ctrl.searchText\"\n" +
    "                        md-selected-item-change=\"Ctrl.selectedItemChange(item)\"\n" +
    "                        md-items=\"item in Ctrl.querySearch(Ctrl.searchText)\"\n" +
    "                        md-item-text=\"item.name\"\n" +
    "                        md-min-length=\"0\"\n" +
    "                        placeholder=\"Child Name\">\n" +
    "                    <md-item-template>\n" +
    "                        <span md-highlight-text=\"Ctrl.searchText\" md-highlight-flags=\"^i\">{{item.name}}</span>\n" +
    "                    </md-item-template>\n" +
    "                    <md-not-found>\n" +
    "                        No matches found.\n" +
    "                    </md-not-found>\n" +
    "                </md-autocomplete>\n" +
    "\n" +
    "            </div>\n" +
    "        </md-content>\n" +
    "    </md-sidenav>\n" +
    "    <md-toolbar>\n" +
    "        <div class=\"md-toolbar-tools\">\n" +
    "            <md-button class=\"md-icon-button\" aria-label=\"Settings\">\n" +
    "                <md-icon md-svg-icon=\"img/icons/menu.svg\"></md-icon>\n" +
    "            </md-button>\n" +
    "            <h2>\n" +
    "                <span>Accounts</span>\n" +
    "            </h2>\n" +
    "            <span flex></span>\n" +
    "            <md-button ng-click=\"Ctrl.toggleLeft()\" ng-hide=\"Ctrl.isOpenLeft()\">\n" +
    "                Toggle Filters\n" +
    "            </md-button>\n" +
    "            <md-button aria-label=\"Create Account\" ui-sref=\"accounts.item\">\n" +
    "                <md-icon><i class=\"material-icons\">add_circle_outline</i></md-icon>\n" +
    "            </md-button>\n" +
    "        </div>\n" +
    "    </md-toolbar>\n" +
    "    <md-content flex>\n" +
    "        <md-subheader class=\"md-1-line\">\n" +
    "            <div layout=\"row\" layout-align=\"space-around center\" flex>\n" +
    "                <div flex=\"5\"></div>\n" +
    "                <div flex=\"30\">\n" +
    "                    Parent (primary)\n" +
    "                </div>\n" +
    "                <div flex=\"30\">\n" +
    "                    Mobile\n" +
    "                </div>\n" +
    "                <div flex=\"\">\n" +
    "                    Email\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </md-subheader>\n" +
    "        <md-divider class=\"md-1-line\"></md-divider>\n" +
    "        <md-list ng-if=\"Ctrl.items.length\">\n" +
    "            <md-list-item  class=\"md-1-line\"\n" +
    "                           dir-paginate=\"item in Ctrl.items | itemsPerPage: Ctrl.pageSize\"\n" +
    "                           current-page=\"Ctrl.currentPage\"\n" +
    "                           pagination-id=\"orders\"\n" +
    "                           total-items=\"Ctrl.total_items\">\n" +
    "\n" +
    "                <div flex=\"5\">\n" +
    "                    <a ui-sref=\"accounts.item({id:item.id})\" >\n" +
    "                        <i class=\"fa fa-edit\"></i>\n" +
    "                    </a>\n" +
    "                </div>\n" +
    "                <div flex=\"30\">{{Ctrl.getPrimaryParent(item).f_name + Ctrl.getPrimaryParent(item).l_name || ''}}</div>\n" +
    "                <div flex=\"30\">{{Ctrl.getPrimaryParent(item).phone_mobile || ''}}</div>\n" +
    "                <div flex>{{Ctrl.getPrimaryParent(item).juser.email || ''}}</div>\n" +
    "            </md-list-item>\n" +
    "        </md-list>\n" +
    "        <dir-pagination-controls ng-if=\"Ctrl.items.length\"\n" +
    "                                 direction-links=\"true\"\n" +
    "                                 boundary-links=\"true\"\n" +
    "                                 auto-hide=\"true\"\n" +
    "                                 pagination-id=\"orders\"\n" +
    "                ></dir-pagination-controls>\n" +
    "        <h1 ng-if=\"!Ctrl.items.length\">No Orders To Display</h1>\n" +
    "    </md-content>\n" +
    "");
}]);

angular.module("catalog/catalog.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("catalog/catalog.tpl.html",
    "<div class=\"jumbotron\">\n" +
    "  <h1>Non-Trivial AngularJS Made Easy</h1>\n" +
    "\n" +
    "  <p class=\"lead\">\n" +
    "    Everything you need to kickstart AngularJS projects: a best-practice\n" +
    "    directory structure, an intelligent build system, and the best web design\n" +
    "    libraries around.\n" +
    "  </p>\n" +
    "\n" +
    "  <ul class=\"list-inline social-buttons\">\n" +
    "    <li>\n" +
    "      <iframe \n" +
    "        src=\"http://ghbtns.com/github-btn.html?user=ngbp&amp;repo=ngbp&amp;type=watch&amp;count=true\" \n" +
    "        allowtransparency=\"true\" \n" +
    "        frameborder=\"0\" \n" +
    "        scrolling=\"0\" \n" +
    "        width=\"110\" \n" +
    "        height=\"20\">\n" +
    "      </iframe>\n" +
    "    </li>\n" +
    "    <li>\n" +
    "      <iframe \n" +
    "        src=\"http://ghbtns.com/github-btn.html?user=ngbp&amp;repo=ngbp&amp;type=fork&amp;count=true\" \n" +
    "        allowtransparency=\"true\" \n" +
    "        frameborder=\"0\" \n" +
    "        scrolling=\"0\" \n" +
    "        width=\"95\" \n" +
    "        height=\"20\">\n" +
    "      </iframe>\n" +
    "    </li>\n" +
    "    <li>\n" +
    "       <iframe allowtransparency=\"true\" frameborder=\"0\" scrolling=\"no\"\n" +
    "        src=\"https://platform.twitter.com/widgets/tweet_button.html?url=http%3A%2F%2Fbit.ly%2FngBoilerplate&counturl=http%3A%2F%2Fngbp.github.com%2Fngbp&text=Check%20out%20%23ngbp%20-%20an%20awesome%20kickstarter%20for%20web%20projects%20%7C&hashtags=angularjs&via=joshdmiller&related=joshdmiller\"\n" +
    "        style=\"width:130px; height:20px;\"></iframe>\n" +
    "    </li>\n" +
    "    <li plus-one></li>\n" +
    "  </ul> \n" +
    "  \n" +
    "  <div class=\"btn-group\">\n" +
    "    <a href=\"https://github.com/ngbp/ngbp#readme\" class=\"btn btn-large btn-default\">\n" +
    "      <i class=\"fa fa-book\"></i>\n" +
    "      Read the Docs\n" +
    "    </a>\n" +
    "    <a href=\"https://github.com/ngbp/ngbp\" class=\"btn btn-large btn-success\">\n" +
    "      <i class=\"fa fa-download\"></i>\n" +
    "      Download\n" +
    "    </a>\n" +
    "  </div>\n" +
    "\n" +
    "</div>\n" +
    "\n" +
    "<div class=\"marketing\">\n" +
    "  <div class=\"row\">\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-thumbs-up\"></i> Good to Go!</h4>\n" +
    "      <p>\n" +
    "        Kickstarts your project quickly, with everything you need, so you can \n" +
    "        focus on what matters: your app.\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-magic\"></i> Complete Build System</h4>\n" +
    "      <p>\n" +
    "        A smart, <a href=\"http://gruntjs.com\">Grunt</a>-based build system \n" +
    "        designed to save you time and energy.\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-retweet\"></i> Modularization</h4>\n" +
    "      <p>\n" +
    "        Supports a structure that maintains separation of concerns while\n" +
    "        ensuring maximum code reuse.\n" +
    "      </p>\n" +
    "    </div>\n" +
    "  </div>\n" +
    "  <div class=\"row\">\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-star\"></i> AngularJS</h4>\n" +
    "      <p>\n" +
    "        JavaScript framework that augments browser-based, single-page \n" +
    "        applications with MVC functionality.\n" +
    "        <a href=\"http://angularjs.org\">More &raquo;</a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-resize-small\"></i> LESS CSS</h4>\n" +
    "      <p>\n" +
    "        The dynamic stylesheet language that extends CSS with efficiency.\n" +
    "        <a href=\"http://lesscss.org\">More &raquo;</a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-twitter\"></i> Twitter Bootstrap</h4>\n" +
    "      <p>\n" +
    "        Sleek, intuitive, and powerful front-end framework for faster and easier\n" +
    "        web development.\n" +
    "        <a href=\"http://getbootstrap.com\">More &raquo;</a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "  </div>\n" +
    "  <div class=\"row\">\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-circle\"></i> Angular UI Bootstrap</h4>\n" +
    "      <p>\n" +
    "        Pure AngularJS components for Bootstrap written by the \n" +
    "        <a href=\"https://github.com/angular-ui?tab=members\">AngularUI Team</a>.\n" +
    "        <a href=\"http://angular-ui.github.com/bootstrap\">More &raquo;</a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-flag\"></i> Font Awesome</h4>\n" +
    "      <p>\n" +
    "        The iconic font designed for use with Twitter Bootstrap.\n" +
    "        <a href=\"http://fortawesome.github.com/Font-Awesome\">\n" +
    "          More &raquo;\n" +
    "        </a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-asterisk\"></i> Placeholders</h4>\n" +
    "      <p>\n" +
    "        Client-side image and text placeholder directives written in pure \n" +
    "        AngularJS to make designing mock-ups wicked-fast.\n" +
    "        <a href=\"http://joshdmiller.github.com/angular-placeholders\">\n" +
    "          More &raquo;\n" +
    "        </a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "  </div>\n" +
    "</div>\n" +
    "\n" +
    "");
}]);

angular.module("catalog/item/item.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("catalog/item/item.tpl.html",
    "<div class=\"jumbotron\">\n" +
    "  <h1>Non-Trivial AngularJS Made Easy</h1>\n" +
    "\n" +
    "  <p class=\"lead\">\n" +
    "    Everything you need to kickstart AngularJS projects: a best-practice\n" +
    "    directory structure, an intelligent build system, and the best web design\n" +
    "    libraries around.\n" +
    "  </p>\n" +
    "\n" +
    "  <ul class=\"list-inline social-buttons\">\n" +
    "    <li>\n" +
    "      <iframe \n" +
    "        src=\"http://ghbtns.com/github-btn.html?user=ngbp&amp;repo=ngbp&amp;type=watch&amp;count=true\" \n" +
    "        allowtransparency=\"true\" \n" +
    "        frameborder=\"0\" \n" +
    "        scrolling=\"0\" \n" +
    "        width=\"110\" \n" +
    "        height=\"20\">\n" +
    "      </iframe>\n" +
    "    </li>\n" +
    "    <li>\n" +
    "      <iframe \n" +
    "        src=\"http://ghbtns.com/github-btn.html?user=ngbp&amp;repo=ngbp&amp;type=fork&amp;count=true\" \n" +
    "        allowtransparency=\"true\" \n" +
    "        frameborder=\"0\" \n" +
    "        scrolling=\"0\" \n" +
    "        width=\"95\" \n" +
    "        height=\"20\">\n" +
    "      </iframe>\n" +
    "    </li>\n" +
    "    <li>\n" +
    "       <iframe allowtransparency=\"true\" frameborder=\"0\" scrolling=\"no\"\n" +
    "        src=\"https://platform.twitter.com/widgets/tweet_button.html?url=http%3A%2F%2Fbit.ly%2FngBoilerplate&counturl=http%3A%2F%2Fngbp.github.com%2Fngbp&text=Check%20out%20%23ngbp%20-%20an%20awesome%20kickstarter%20for%20web%20projects%20%7C&hashtags=angularjs&via=joshdmiller&related=joshdmiller\"\n" +
    "        style=\"width:130px; height:20px;\"></iframe>\n" +
    "    </li>\n" +
    "    <li plus-one></li>\n" +
    "  </ul> \n" +
    "  \n" +
    "  <div class=\"btn-group\">\n" +
    "    <a href=\"https://github.com/ngbp/ngbp#readme\" class=\"btn btn-large btn-default\">\n" +
    "      <i class=\"fa fa-book\"></i>\n" +
    "      Read the Docs\n" +
    "    </a>\n" +
    "    <a href=\"https://github.com/ngbp/ngbp\" class=\"btn btn-large btn-success\">\n" +
    "      <i class=\"fa fa-download\"></i>\n" +
    "      Download\n" +
    "    </a>\n" +
    "  </div>\n" +
    "\n" +
    "</div>\n" +
    "\n" +
    "<div class=\"marketing\">\n" +
    "  <div class=\"row\">\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-thumbs-up\"></i> Good to Go!</h4>\n" +
    "      <p>\n" +
    "        Kickstarts your project quickly, with everything you need, so you can \n" +
    "        focus on what matters: your app.\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-magic\"></i> Complete Build System</h4>\n" +
    "      <p>\n" +
    "        A smart, <a href=\"http://gruntjs.com\">Grunt</a>-based build system \n" +
    "        designed to save you time and energy.\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-retweet\"></i> Modularization</h4>\n" +
    "      <p>\n" +
    "        Supports a structure that maintains separation of concerns while\n" +
    "        ensuring maximum code reuse.\n" +
    "      </p>\n" +
    "    </div>\n" +
    "  </div>\n" +
    "  <div class=\"row\">\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-star\"></i> AngularJS</h4>\n" +
    "      <p>\n" +
    "        JavaScript framework that augments browser-based, single-page \n" +
    "        applications with MVC functionality.\n" +
    "        <a href=\"http://angularjs.org\">More &raquo;</a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-resize-small\"></i> LESS CSS</h4>\n" +
    "      <p>\n" +
    "        The dynamic stylesheet language that extends CSS with efficiency.\n" +
    "        <a href=\"http://lesscss.org\">More &raquo;</a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-twitter\"></i> Twitter Bootstrap</h4>\n" +
    "      <p>\n" +
    "        Sleek, intuitive, and powerful front-end framework for faster and easier\n" +
    "        web development.\n" +
    "        <a href=\"http://getbootstrap.com\">More &raquo;</a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "  </div>\n" +
    "  <div class=\"row\">\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-circle\"></i> Angular UI Bootstrap</h4>\n" +
    "      <p>\n" +
    "        Pure AngularJS components for Bootstrap written by the \n" +
    "        <a href=\"https://github.com/angular-ui?tab=members\">AngularUI Team</a>.\n" +
    "        <a href=\"http://angular-ui.github.com/bootstrap\">More &raquo;</a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-flag\"></i> Font Awesome</h4>\n" +
    "      <p>\n" +
    "        The iconic font designed for use with Twitter Bootstrap.\n" +
    "        <a href=\"http://fortawesome.github.com/Font-Awesome\">\n" +
    "          More &raquo;\n" +
    "        </a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-asterisk\"></i> Placeholders</h4>\n" +
    "      <p>\n" +
    "        Client-side image and text placeholder directives written in pure \n" +
    "        AngularJS to make designing mock-ups wicked-fast.\n" +
    "        <a href=\"http://joshdmiller.github.com/angular-placeholders\">\n" +
    "          More &raquo;\n" +
    "        </a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "  </div>\n" +
    "</div>\n" +
    "\n" +
    "");
}]);

angular.module("categories/categories.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("categories/categories.tpl.html",
    "<div ng-controller=\"CategoriesCtrl as Ctrl\">\n" +
    "   <md-toolbar>\n" +
    "        <div class=\"md-toolbar-tools\">\n" +
    "            <md-button class=\"md-icon-button\" aria-label=\"Settings\">\n" +
    "                <md-icon md-svg-icon=\"img/icons/menu.svg\"></md-icon>\n" +
    "            </md-button>\n" +
    "            <h2>\n" +
    "                <span>Product Categories</span>\n" +
    "            </h2>\n" +
    "            <span flex></span>\n" +
    "            <md-button class=\"md-icon-button\" aria-label=\"Favorite\">\n" +
    "                <md-icon md-svg-icon=\"img/icons/favorite.svg\"></md-icon>\n" +
    "            </md-button>\n" +
    "            <md-button aria-label=\"Create Category\" ui-sref=\"categories.item\">\n" +
    "                <i class=\"material-icons\">add_circle_outline</i>\n" +
    "            </md-button>\n" +
    "        </div>\n" +
    "    </md-toolbar>\n" +
    "    <md-content flex>\n" +
    "        <md-list>\n" +
    "            <md-list-item class=\"md-3-line\" ng-repeat=\"item in Ctrl.items\">\n" +
    "                <div class=\"col-xs-12 col-sm-6 col-md-6\">\n" +
    "                    <h4>\n" +
    "                        <a ui-sref=\"categories.item({id:item.id})\" >\n" +
    "                            <i class=\"fa fa-edit\"></i> {{item.title}}\n" +
    "                        </a>\n" +
    "                    </h4>\n" +
    "                </div>\n" +
    "                <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "                    <h4>{{item.data}}</h4>\n" +
    "                </div>\n" +
    "            </md-list-item>\n" +
    "        </md-list>\n" +
    "    <md-content>\n" +
    "</div>");
}]);

angular.module("categories/item/item.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("categories/item/item.tpl.html",
    "<div  ng-controller=\"CategoriesItemCtrl as Ctrl\">\n" +
    "    <md-toolbar>\n" +
    "        <div class=\"md-toolbar-tools\">\n" +
    "            <md-button class=\"md-icon-button\" aria-label=\"Settings\">\n" +
    "                <md-icon md-svg-icon=\"img/icons/menu.svg\"></md-icon>\n" +
    "            </md-button>\n" +
    "            <h2>\n" +
    "                <div class=\"form-horizontal\">\n" +
    "                    Product Category:\n" +
    "                    <a href=\"#\" editable-text=\"Ctrl.item.title\">\n" +
    "                        {{ Ctrl.item.title || 'TITLE' }}\n" +
    "                    </a>\n" +
    "                </div>\n" +
    "            </h2>\n" +
    "            <span flex></span>\n" +
    "            <md-button class=\"md-icon-button\" aria-label=\"Favorite\">\n" +
    "                <md-icon md-svg-icon=\"img/icons/favorite.svg\"></md-icon>\n" +
    "            </md-button>\n" +
    "            <md-button class=\"md-icon-button\" aria-label=\"More\" ng-click=\"Ctrl.saveItem()\">\n" +
    "                <md-icon><i class=\"material-icons\">check</i></md-icon>\n" +
    "            </md-button>\n" +
    "        </div>\n" +
    "    </md-toolbar>\n" +
    "    <div class=\"form-horizontal\">\n" +
    "        <div class=\"form-group\">\n" +
    "            <label class=\"col-md-4 control-label\">Description:</label>\n" +
    "            <a  class=\"form-control input-md\" href=\"#\" editable-textarea=\"Ctrl.item.description\" e-rows=\"7\" e-cols=\"60\">\n" +
    "                {{ Ctrl.item.description || 'DESCRIPTION' }}\n" +
    "            </a>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "    <div class=\"form-horizontal\">\n" +
    "        <div class=\"form-group\">\n" +
    "            <label class=\"col-md-4 control-label\">Parent Category:</label>\n" +
    "            <a href=\"#\" editable-select=\"Ctrl.item.parent_id\" e-ng-options=\"o.id as o.title for o in Ctrl.parentOptions\">\n" +
    "                {{ Ctrl.showParent() || 'not set' }}\n" +
    "            </a>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>\n" +
    "");
}]);

angular.module("children/item/item.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("children/item/item.tpl.html",
    "<md-toolbar  md-scroll-shrink>\n" +
    "    <div class=\"md-toolbar-tools\">\n" +
    "        <md-button class=\"md-icon-button\" aria-label=\"Settings\">\n" +
    "            <md-icon md-svg-icon=\"img/icons/menu.svg\"></md-icon>\n" +
    "        </md-button>\n" +
    "        <h2>\n" +
    "            Child Detail: {{ Ctrl.item.name || '' }}\n" +
    "        </h2>\n" +
    "        <span flex></span>\n" +
    "        <div>\n" +
    "            <md-button tooltip=\"Save Current Item State\"\n" +
    "                       tooltip-placement=\"left\"\n" +
    "                       class=\"md-icon-button\"\n" +
    "                       aria-label=\"Save\"\n" +
    "                       ng-click=\"Ctrl.saveItem()\">\n" +
    "                <md-icon><i class=\"material-icons\">check</i></md-icon>\n" +
    "            </md-button>\n" +
    "\n" +
    "            <md-button class=\"md-icon-button\"\n" +
    "                       tooltip=\"Close Current Item\"\n" +
    "                       tooltip-placement=\"left\"\n" +
    "                       aria-label=\"More\"\n" +
    "                       ng-click=\"Ctrl.cancelItem()\">\n" +
    "                <md-icon> <i class=\"material-icons\">cancel_circle_outline</i> </md-icon>\n" +
    "            </md-button>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</md-toolbar>\n" +
    "<md-content class=\"md-whiteframe-1dp\" flex>\n" +
    "    <div flex>\n" +
    "        <img class=\"parentProfilePicture\" ng-src=\"/images/children/{{Ctrl.item.image}}\"/>\n" +
    "    </div>\n" +
    "    <div>\n" +
    "        {{item.name}}\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-6\">\n" +
    "        {{item.dob | date:'shortDate' }}\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-3 col-md-3\">\n" +
    "        <md-button ng-click=\"Ctrl.removeChild($index)\">\n" +
    "            <md-icon><i class=\"material-icons\">cancel_circle_outline</i></md-icon>\n" +
    "        </md-button>\n" +
    "    </div\n" +
    "</md-content>\n" +
    "");
}]);

angular.module("children/items/items.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("children/items/items.tpl.html",
    "<md-sidenav class=\"md-sidenav-left md-whiteframe-z2\" md-component-id=\"left\" >\n" +
    "    <md-toolbar layout=\"row\">\n" +
    "        <div class=\"md-toolbar-tools\" ng-controller=\"LeftCtrl\" >\n" +
    "            <h1>Filters</h1>\n" +
    "            <span flex></span>\n" +
    "            <md-button ng-click=\"close()\" class=\"md-primary\" md-sidenav-focus>Close</md-button>\n" +
    "        </div>\n" +
    "    </md-toolbar>\n" +
    "    <md-content>\n" +
    "        <md-input-container flex>\n" +
    "            <label>State</label>\n" +
    "            <md-select aria-label placeholder=\"state\" ng-model=\"Ctrl.filters.state\">\n" +
    "                <md-option ng-repeat=\"state in [{text:'current',value:1},{text:'archive',value:0}]\" value=\"{{state.value}}\">\n" +
    "                    {{state.text}}\n" +
    "                </md-option>\n" +
    "            </md-select>\n" +
    "        </md-input-container>\n" +
    "        <md-input-container flex>\n" +
    "            <label>Status</label>\n" +
    "            <md-select placeholder=\"Status\" ng-model=\"Ctrl.filters.status\">\n" +
    "                <md-option ng-repeat=\"status in Ctrl.statusOptions\" value=\"{{status.value}}\">\n" +
    "                    {{status.text}}\n" +
    "                </md-option>\n" +
    "            </md-select>\n" +
    "        </md-input-container>\n" +
    "        <md-input-container>\n" +
    "            <lable>Mobile Number</lable>\n" +
    "            <md-input ng-model=\"Ctrl.filters.phone_mobile\"></md-input>\n" +
    "        </md-input-container>\n" +
    "        <md-input-container ng-controller=\"ParentSearchCtrl as Ctrl\">\n" +
    "            <label>First or Last Name</label>\n" +
    "            <md-autocomplete\n" +
    "                    md-delay=\"500\"\n" +
    "                    ng-disabled=\"false\"\n" +
    "                    md-no-cache=\"false\"\n" +
    "                    md-selected-item=\"Ctrl.parent\"\n" +
    "                    md-search-text-change=\"Ctrl.searchTextChange(Ctrl.searchText)\"\n" +
    "                    md-search-text=\"Ctrl.searchText\"\n" +
    "                    md-selected-item-change=\"Ctrl.selectedItemChange(item)\"\n" +
    "                    md-items=\"item in Ctrl.querySearch(Ctrl.searchText)\"\n" +
    "                    md-item-text=\"item.f_name + ' ' + item.l_name\"\n" +
    "                    md-min-length=\"0\"\n" +
    "                    placeholder=\"Parent Name\">\n" +
    "                <md-item-template>\n" +
    "                    <span md-highlight-text=\"Ctrl.searchText\" md-highlight-flags=\"^i\">{{item.f_name}} {{item.l_name}}</span>\n" +
    "                </md-item-template>\n" +
    "                <md-not-found>\n" +
    "                    No matching items found.\n" +
    "                </md-not-found>\n" +
    "            </md-autocomplete>\n" +
    "        </md-input-container>\n" +
    "        <md-input-container ng-controller=\"ChildSearchCtrl as Ctrl\">\n" +
    "            <label>First or Last Name</label>\n" +
    "            <md-autocomplete\n" +
    "                    md-delay=\"500\"\n" +
    "                    ng-disabled=\"false\"\n" +
    "                    md-no-cache=\"false\"\n" +
    "                    md-selected-item=\"Ctrl.child\"\n" +
    "                    md-search-text-change=\"Ctrl.searchTextChange(Ctrl.searchText)\"\n" +
    "                    md-search-text=\"Ctrl.searchText\"\n" +
    "                    md-selected-item-change=\"Ctrl.selectedItemChange(item)\"\n" +
    "                    md-items=\"item in Ctrl.querySearch(Ctrl.searchText)\"\n" +
    "                    md-item-text=\"item.name\"\n" +
    "                    md-min-length=\"0\"\n" +
    "                    placeholder=\"Child Name\">\n" +
    "                <md-item-template>\n" +
    "                    <span md-highlight-text=\"Ctrl.searchText\" md-highlight-flags=\"^i\">{{item.f_name}} {{item.l_name}}</span>\n" +
    "                </md-item-template>\n" +
    "                <md-not-found>\n" +
    "                    No matching items found.\n" +
    "                </md-not-found>\n" +
    "            </md-autocomplete>\n" +
    "        </md-input-container>\n" +
    "    </md-content>\n" +
    "</md-sidenav>\n" +
    "<md-toolbar>\n" +
    "    <div class=\"md-toolbar-tools\">\n" +
    "        <md-button class=\"md-icon-button\" aria-label=\"Settings\">\n" +
    "            <md-icon md-svg-icon=\"img/icons/menu.svg\"></md-icon>\n" +
    "        </md-button>\n" +
    "        <h2>\n" +
    "            <span>Children</span>\n" +
    "        </h2>\n" +
    "        <span flex></span>\n" +
    "        <md-button ng-click=\"Ctrl.toggleLeft()\" ng-hide=\"Ctrl.isOpenLeft()\">\n" +
    "            Toggle Filters\n" +
    "        </md-button>\n" +
    "    </div>\n" +
    "</md-toolbar>\n" +
    "<md-content flex>\n" +
    "    <md-subheader class=\"md-4-line\" >\n" +
    "        <div layout=\"row\" layout-align=\"space-around center\" flex>\n" +
    "            <div flex=\"4\"></div>\n" +
    "            <div flex=\"10\">Created</div>\n" +
    "            <div flex=\"20\">Name</div>\n" +
    "            <div flex=\"20\">Parent(primary)</div>\n" +
    "            <div flex>Email</div>\n" +
    "        </div>\n" +
    "    </md-subheader>\n" +
    "    <md-list ng-if=\"Ctrl.items.length\">\n" +
    "        <md-list-item class=\"md-3-line\" class=\"md-3-line\"\n" +
    "                      dir-paginate=\"item in Ctrl.items | itemsPerPage: Ctrl.pageSize\"\n" +
    "                      current-page=\"Ctrl.currentPage\"\n" +
    "                      pagination-id=\"children\"\n" +
    "                      total-items=\"Ctrl.total_items\">\n" +
    "            <div layout=\"row\" layout-align=\"space-around center\" flex>\n" +
    "                <div flex=\"10\">\n" +
    "                    <a ui-sref=\"children.item({id:item.id})\">\n" +
    "                        <i class=\"fa fa-edit\"></i>\n" +
    "                    </a>\n" +
    "                </div>\n" +
    "                <div flex=\"10\">\n" +
    "                     {{item.created * 1000 | date:'shortDate' }}\n" +
    "                </div>\n" +
    "                <div flex=\"20\">\n" +
    "                    {{item.name}}\n" +
    "                </div>\n" +
    "                <div flex>\n" +
    "                    {{item.parent}}\n" +
    "                </div>\n" +
    "                <div flex>\n" +
    "                    {{item.dob * 1000 | date:'shortDate' }}\n" +
    "                </div>\n" +
    "\n" +
    "            </div>\n" +
    "        </md-list-item>\n" +
    "    </md-list>\n" +
    "    <dir-pagination-controls ng-if=\"Ctrl.items.length\"\n" +
    "                             direction-links=\"true\"\n" +
    "                             boundary-links=\"true\"\n" +
    "                             auto-hide=\"true\"\n" +
    "                             pagination-id=\"children\"\n" +
    "            ></dir-pagination-controls>\n" +
    "    <div class=\"empty_result\">\n" +
    "        <h1 ng-if=\"!Ctrl.items.length\">No Parents To Display</h1>\n" +
    "    </div>\n" +
    "</md-content>");
}]);

angular.module("coaches/item/coach.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("coaches/item/coach.tpl.html",
    "<md-toolbar  md-scroll-shrink>\n" +
    "    <div class=\"md-toolbar-tools\">\n" +
    "        <md-button class=\"md-icon-button\" aria-label=\"Settings\">\n" +
    "            <md-icon md-svg-icon=\"img/icons/menu.svg\"></md-icon>\n" +
    "        </md-button>\n" +
    "        <h2>\n" +
    "            <span>Coach</span>\n" +
    "            {{ Ctrl.item.title || '' }} {{Ctrl.item.name || '' }}\n" +
    "\n" +
    "        </h2>\n" +
    "        <span flex></span>\n" +
    "        <md-button tooltip=\"Save Current Item State\"\n" +
    "                   tooltip-placement=\"left\"\n" +
    "                   class=\"md-icon-button\"\n" +
    "                   aria-label=\"Save\"\n" +
    "                   ng-click=\"Ctrl.saveItem()\">\n" +
    "            <md-icon><i class=\"material-icons\">check</i></md-icon>\n" +
    "        </md-button>\n" +
    "        <div class=\"test\">\n" +
    "            <md-button class=\"md-icon-button md-warn\"\n" +
    "                       tooltip=\"Delete Current Item\"\n" +
    "                       tooltip-placement=\"left\"\n" +
    "                       aria-label=\"More\"\n" +
    "                       ng-click=\"Ctrl.deleteItem()\">\n" +
    "                <md-icon> <i class=\"material-icons\">delete</i> </md-icon>\n" +
    "            </md-button>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</md-toolbar>\n" +
    "<md-content >\n" +
    "    <section>\n" +
    "        <div class=\"coachProfileTop\">\n" +
    "            <div flex>\n" +
    "                <img class=\"coachProfilePicture\" ng-src=\"/images/coaches/{{Ctrl.item.image}}\"/>\n" +
    "            </div>\n" +
    "            <div class=\"coachProfileBasicinfo\">\n" +
    "                <div class=\"coachProfileBasicinfoName\">\n" +
    "                    <fieldset>\n" +
    "                        <div class=\"form-control-group\">\n" +
    "                            <div class=\"form-group\">\n" +
    "                                <label class=\"col-md-4 control-label\">Title</label>\n" +
    "                                <a href=\"#\" editable-select=\"Ctrl.item.title\" e-ng-options=\"o.value as o.text for o in Ctrl.titleOptions\">\n" +
    "                                    {{ Ctrl.showTitle() || '_____' }}\n" +
    "                                </a>\n" +
    "                            </div>\n" +
    "                            <div class=\"form-group\">\n" +
    "                                <label class=\"col-md-4 control-label\">Name</label>\n" +
    "                                <a href=\"#\" editable-text=\"Ctrl.item.name\">\n" +
    "                                    {{ Ctrl.item.name || '_____' }}\n" +
    "                                </a>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </fieldset>\n" +
    "                </div>\n" +
    "\n" +
    "\n" +
    "                    <div class=\"form-group\">\n" +
    "                        <label class=\"col-md-4 control-label\">Archived?</label>\n" +
    "                        <md-switch class=\"md-primary md-block\" aria-label=\"Switch No Ink\"\n" +
    "                                   ng-model=\"Ctrl.item.state\" ng-true-value='\"1\"' ng-false-value='\"0\"'>{{Ctrl.item.state | yesno}}</md-switch>\n" +
    "                    </div>\n" +
    "                    <div class=\"form-group\">\n" +
    "                        <label class=\"col-md-4 control-label\">Phone</label>\n" +
    "                        <a href=\"#\" editable-text=\"Ctrl.item.phone\">\n" +
    "                            {{ Ctrl.item.phone || '_____' }}\n" +
    "                        </a>\n" +
    "                    </div>\n" +
    "                <div class=\"form-group\">\n" +
    "                    <label class=\"col-md-4 control-label\">Driving</label>\n" +
    "                    <md-switch class=\"md-primary md-block\" aria-label=\"Switch No Ink\"\n" +
    "                               ng-model=\"Ctrl.item.driving\" ng-true-value='\"1\"' ng-false-value='\"0\"'>{{Ctrl.item.driving | yesno}}</md-switch>\n" +
    "                </div>\n" +
    "                <div class=\"form-group\">\n" +
    "                    <label class=\"col-md-4 control-label\">Kit Holder</label>\n" +
    "                    <md-switch class=\"md-primary md-block\" aria-label=\"Switch No Ink\"\n" +
    "                               ng-model=\"Ctrl.item.kitholder\" ng-true-value='\"1\"' ng-false-value='\"0\"'>{{Ctrl.item.kitholder | yesno}}</md-switch>\n" +
    "                </div>\n" +
    "                <div class=\"form-group\">\n" +
    "                    <label class=\"col-md-4 control-label\">Reserve</label>\n" +
    "                    <md-switch class=\"md-primary md-block\" aria-label=\"Switch No Ink\"\n" +
    "                               ng-model=\"Ctrl.item.reserve\" ng-true-value='\"1\"' ng-false-value='\"0\"'>{{Ctrl.item.reserve | yesno}}</md-switch>\n" +
    "                </div>\n" +
    "                <div class=\"form-group\">\n" +
    "                    <label class=\"col-md-4 control-label\">Role</label>\n" +
    "                    <a href=\"#\" editable-select=\"Ctrl.item.role\" e-ng-options=\"o.value as o.text for o in Ctrl.roleOptions\">\n" +
    "                        {{ Ctrl.showRole() || '_____' }}\n" +
    "                    </a>\n" +
    "                </div>\n" +
    "\n" +
    "                <fieldset>\n" +
    "                    <legend>Availability:</legend>\n" +
    "                    <div class=\"form-group\">\n" +
    "                        <div class=\"controls\">\n" +
    "                            <label class=\"checkbox inline\" for=\"multiplecheckboxesinline-0-0\">\n" +
    "                                <input type=\"checkbox\" ng-model=\"doftw1\" id=\"multiplecheckboxesinline-0-0\" value=\"1\">\n" +
    "                                Monday\n" +
    "                            </label>\n" +
    "                            <label class=\"checkbox inline\" for=\"multiplecheckboxesinline-0-1\">\n" +
    "                                <input type=\"checkbox\" ng-model=\"doftw2\" id=\"multiplecheckboxesinline-0-1\" value=\"2\">\n" +
    "                                Tuesday\n" +
    "                            </label>\n" +
    "                            <label class=\"checkbox inline\" for=\"multiplecheckboxesinline-0-2\">\n" +
    "                                <input type=\"checkbox\" ng-model=\"doftw3\" id=\"multiplecheckboxesinline-0-2\" value=\"3\">\n" +
    "                                Wednesday\n" +
    "                            </label>\n" +
    "                            <label class=\"checkbox inline\" for=\"multiplecheckboxesinline-0-3\">\n" +
    "                                <input type=\"checkbox\" ng-model=\"doftw4\" id=\"multiplecheckboxesinline-0-3\" value=\"4\">\n" +
    "                                Thursday\n" +
    "                            </label>\n" +
    "                            <label class=\"checkbox inline\" for=\"multiplecheckboxesinline-0-4\">\n" +
    "                                <input type=\"checkbox\" ng-model=\"doftw5\" id=\"multiplecheckboxesinline-0-4\" value=\"4\">\n" +
    "                                Friday\n" +
    "                            </label>\n" +
    "                            <label class=\"checkbox inline\" for=\"multiplecheckboxesinline-0-5\">\n" +
    "                                <input type=\"checkbox\" ng-model=\"doftw6\" id=\"multiplecheckboxesinline-0-5\" value=\"4\">\n" +
    "                                Saturday\n" +
    "                            </label>\n" +
    "                            <label class=\"checkbox inline\" for=\"multiplecheckboxesinline-0-6\">\n" +
    "                                <input type=\"checkbox\" ng-model=\"doftw7\" id=\"multiplecheckboxesinline-0-6\" value=\"4\">\n" +
    "                                Sunday\n" +
    "                            </label>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                </fieldset>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "\n" +
    "\n" +
    "\n" +
    "    </section>\n" +
    "    <section>\n" +
    "\n" +
    "    </section>\n" +
    "</md-content>\n" +
    "");
}]);

angular.module("coaches/items/coaches.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("coaches/items/coaches.tpl.html",
    "<md-sidenav class=\"md-sidenav-left md-whiteframe-z2\" md-component-id=\"left\" >\n" +
    "    <md-toolbar layout=\"row\">\n" +
    "        <div class=\"md-toolbar-tools\" ng-controller=\"LeftCtrl\" >\n" +
    "            <h1>Filters</h1>\n" +
    "            <span flex></span>\n" +
    "            <md-button ng-click=\"close()\" class=\"md-primary\" md-sidenav-focus>Close</md-button>\n" +
    "        </div>\n" +
    "    </md-toolbar>\n" +
    "    <md-content layout=\"column\" flex>\n" +
    "        <md-input-container>\n" +
    "            <label>State</label>\n" +
    "            <md-select placeholder=\"state\" ng-model=\"Ctrl.filters.state\">\n" +
    "                <md-option ng-repeat=\"state in [{text:'current',value:1},{text:'archive',value:0}]\" value=\"{{state.value}}\">\n" +
    "                    {{state.text}}\n" +
    "                </md-option>\n" +
    "            </md-select>\n" +
    "        </md-input-container>\n" +
    "        <md-input-container>\n" +
    "            <label>Role</label>\n" +
    "            <md-select placeholder=\"Role\" ng-model=\"Ctrl.filters.role\">\n" +
    "                <md-option ng-repeat=\"role in\n" +
    "                    [   {text:'Any',value:'any'},\n" +
    "                        {text:'Lead',value:'Lead'},\n" +
    "                        {text:'Support',value:'Support'},\n" +
    "                        {text:'Trainee',value:'Trainee'}\n" +
    "                    ]\" value=\"{{role.value}}\">\n" +
    "                    {{role.text}}\n" +
    "                </md-option>\n" +
    "            </md-select>\n" +
    "        </md-input-container>\n" +
    "        <md-input-container>\n" +
    "            <label>Town/City</label>\n" +
    "            <input ng-model=\"Ctrl.filters.city\"/>\n" +
    "        </md-input-container>\n" +
    "        <md-input-container>\n" +
    "            <label>Day of the Week</label>\n" +
    "            <md-select md-on-close=\"Ctrl.evalFiltersDoftw()\" multiple=\"true\" ng-change=\"angular.noop()\" placeholder=\"Day of the Week\" ng-model=\"Ctrl.doftw\">\n" +
    "                <md-option ng-repeat=\"doftw in [\n" +
    "                    {\n" +
    "                        text:'Monday',\n" +
    "                        value: 'doftw1'},\n" +
    "                    {\n" +
    "                        text:'Tuesday',\n" +
    "                        value: 'doftw2'},\n" +
    "                    {\n" +
    "                        text:'Wednesday',\n" +
    "                        value: 'doftw3'},\n" +
    "                    {\n" +
    "                        text:'Thursday',\n" +
    "                        value: 'doftw4'},\n" +
    "                    {\n" +
    "                        text:'Friday',\n" +
    "                        value: 'doftw5'},\n" +
    "                    {\n" +
    "                        text:'Saturday',\n" +
    "                        value: 'doftw6'},\n" +
    "                    {\n" +
    "                        text:'Sunday',\n" +
    "                        value:'doftw7'\n" +
    "                        }\n" +
    "                    ]\" value=\"{{doftw.value}}\">\n" +
    "                    {{doftw.text}}\n" +
    "                </md-option>\n" +
    "            </md-select>\n" +
    "        </md-input-container>\n" +
    "        <md-input-container>\n" +
    "            <md-checkbox ng-model=\"Ctrl.filters.kitholder\" ng-false-value=\"0\" ng-true-value=\"1\">Kit Holder</md-checkbox>\n" +
    "        </md-input-container>\n" +
    "        <md-input-container>\n" +
    "            <md-checkbox ng-model=\"Ctrl.filters.driving\" ng-false-value=0 ng-true-value=1>Driving</md-checkbox>\n" +
    "        </md-input-container>\n" +
    "    </md-content>\n" +
    "</md-sidenav>\n" +
    "<md-toolbar>\n" +
    "    <div class=\"md-toolbar-tools\">\n" +
    "        <md-button class=\"md-icon-button\" aria-label=\"Settings\">\n" +
    "            <md-icon md-svg-icon=\"img/icons/menu.svg\"></md-icon>\n" +
    "        </md-button>\n" +
    "        <h2>\n" +
    "            <span>Coaches</span>\n" +
    "        </h2>\n" +
    "        <span flex></span>\n" +
    "        <md-button class=\"md-icon-button\" aria-label=\"Favorite\">\n" +
    "            <md-icon md-svg-icon=\"img/icons/favorite.svg\"></md-icon>\n" +
    "        </md-button>\n" +
    "        <md-button ng-click=\"Ctrl.toggleLeft()\" ng-hide=\"Ctrl.isOpenLeft()\">\n" +
    "            Toggle Filters\n" +
    "        </md-button>\n" +
    "        <md-button aria-label=\"Add Coach\" ui-sref=\"coaches.item\">\n" +
    "            <md-icon><i class=\"material-icons\">add_circle_outline</i></md-icon>\n" +
    "        </md-button>\n" +
    "    </div>\n" +
    "</md-toolbar>\n" +
    "<md-content>\n" +
    "    <md-subheader class=\"md-3-line\">\n" +
    "        <div layout=\"row\">\n" +
    "            <div flex=\"5\"></div>\n" +
    "            <div flex=\"15\">\n" +
    "                Name\n" +
    "            </div>\n" +
    "            <div flex=\"20\">\n" +
    "                Town/City\n" +
    "            </div>\n" +
    "            <div flex=\"15\">\n" +
    "                Phone\n" +
    "            </div>\n" +
    "            <div flex=\"20\">\n" +
    "                Email\n" +
    "            </div>\n" +
    "            <div>\n" +
    "                Driving\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </md-subheader>\n" +
    "    <md-list ng-if=\"Ctrl.items.length\">\n" +
    "        <md-list-item class=\"md-1-line\"\n" +
    "                      dir-paginate=\"item in Ctrl.items | itemsPerPage: Ctrl.pageSize\"\n" +
    "                      current-page=\"Ctrl.currentPage\"\n" +
    "                      pagination-id=\"coaches\"\n" +
    "                      total-items=\"Ctrl.total_items\">\n" +
    "            <div flex=\"5\">\n" +
    "                <a ui-sref=\"coaches.item({id:item.id})\" >\n" +
    "                    <i class=\"fa fa-edit\"></i>\n" +
    "                </a>\n" +
    "            </div>\n" +
    "            <div flex=\"15\">\n" +
    "                {{item.name}}\n" +
    "            </div>\n" +
    "            <div flex=\"20\">\n" +
    "                {{item.city}}\n" +
    "            </div>\n" +
    "            <div flex=\"15\">\n" +
    "                {{item.phone}}\n" +
    "            </div>\n" +
    "            <div flex=\"20\">\n" +
    "                {{item.email}}\n" +
    "            </div>\n" +
    "            <div flex>\n" +
    "                {{item.driving | yesno}}\n" +
    "            </div>\n" +
    "        </md-list-item>\n" +
    "    </md-list>\n" +
    "\n" +
    "    <h1 ng-if=\"!Ctrl.items.length\">No Coaches To Display</h1>\n" +
    "</md-content>\n" +
    "<dir-pagination-controls ng-if=\"Ctrl.items.length\"\n" +
    "                         direction-links=\"true\"\n" +
    "                         boundary-links=\"true\"\n" +
    "                         auto-hide=\"true\"\n" +
    "                         pagination-id=\"coaches\"\n" +
    "        ></dir-pagination-controls>");
}]);

angular.module("events/events.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("events/events.tpl.html",
    "<div>\n" +
    "    <md-toolbar>\n" +
    "        <div class=\"md-toolbar-tools\">\n" +
    "            <md-button class=\"md-icon-button\" aria-label=\"Settings\">\n" +
    "                <md-icon md-svg-icon=\"img/icons/menu.svg\"></md-icon>\n" +
    "            </md-button>\n" +
    "            <h2>\n" +
    "                <span>Events</span>\n" +
    "            </h2>\n" +
    "            <span flex></span>\n" +
    "            <md-button class=\"md-icon-button\" aria-label=\"Favorite\">\n" +
    "                <md-icon md-svg-icon=\"img/icons/favorite.svg\"></md-icon>\n" +
    "            </md-button>\n" +
    "            <md-button class=\"md-icon-button\" aria-label=\"More\"  ui-sref=\"events.item\">\n" +
    "                <md-icon><i class=\"material-icons\">add_circle_outline</i></md-icon>\n" +
    "            </md-button>\n" +
    "        </div>\n" +
    "    </md-toolbar>\n" +
    "    <md-content flex>\n" +
    "        <md-list ng-if=\"Ctrl.items.length\">\n" +
    "            <md-list-item class=\"md-3-line\" ng-repeat=\"item in Ctrl.items\">\n" +
    "                <div class=\"col-xs-12 col-sm-6 col-md-6\">\n" +
    "                    <h4>\n" +
    "                        <a ui-sref=\"events.item({id:item.id})\">\n" +
    "                            <i class=\"fa fa-edit\"></i> {{Ctrl.getEventProductTitle(item.product_id)}} at {{Ctrl.getEventVenueTitle(item.venue_id)}}\n" +
    "                        </a>\n" +
    "                    </h4>\n" +
    "                </div>\n" +
    "\n" +
    "            </md-list-item>\n" +
    "        </md-list>\n" +
    "        <div class=\"empty_result\">\n" +
    "            <h1 ng-if=\"!Ctrl.items.length\">No Events To Display</h1>\n" +
    "        </div>\n" +
    "    </md-content>\n" +
    "</div>");
}]);

angular.module("events/item/item.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("events/item/item.tpl.html",
    "<div ng-controller=\"EventsItemCtrl as Ctrl\">\n" +
    "    <md-toolbar>\n" +
    "        <div class=\"md-toolbar-tools\">\n" +
    "            <md-button class=\"md-icon-button\" aria-label=\"Settings\">\n" +
    "                <md-icon md-svg-icon=\"img/icons/menu.svg\"></md-icon>\n" +
    "            </md-button>\n" +
    "            <h2>\n" +
    "                Event Detail:\n" +
    "                <a href=\"#\" editable-select=\"Ctrl.item.product_id\"\n" +
    "                   e-ng-options=\"o.id as o.title for o in Ctrl.productOptions\">\n" +
    "                    {{ Ctrl.showProduct() || 'PRODUCT TITLE' }}\n" +
    "                </a>\n" +
    "                at\n" +
    "                <a href=\"#\" editable-select=\"Ctrl.item.venue_id\"\n" +
    "                   e-ng-options=\"o.id as o.title for o in Ctrl.venueOptions\">\n" +
    "                    {{ Ctrl.showVenue() || 'SELECT VENUE' }}\n" +
    "                </a>\n" +
    "            </h2>\n" +
    "            <span flex></span>\n" +
    "            <md-button class=\"md-icon-button\" aria-label=\"Favorite\">\n" +
    "                <md-icon md-svg-icon=\"img/icons/favorite.svg\"></md-icon>\n" +
    "            </md-button>\n" +
    "            <md-button class=\"md-icon-button\" aria-label=\"More\"  ng-click=\"Ctrl.saveItem()\">\n" +
    "                <md-icon> <i class=\"material-icons\">check</i> </md-icon>\n" +
    "            </md-button>\n" +
    "        </div>\n" +
    "    </md-toolbar>\n" +
    "    <md-content>\n" +
    "        <div class=\"container-fluid\">\n" +
    "            <fieldset>\n" +
    "                <div class=\"form-inline\">\n" +
    "                    <label class=\"col-md-4 control-label\">Cost Modifier:</label>\n" +
    "                    <a href=\"#\" class=\" input-sm\" editable-text=\"Ctrl.item.costmod\">\n" +
    "                        {{ Ctrl.item.costmod || 'Cost Modifier' }}\n" +
    "                    </a>\n" +
    "                </div>\n" +
    "            </fieldset>\n" +
    "            <fieldset>\n" +
    "                <legend>Scheduling</legend>\n" +
    "\n" +
    "                <div rg-range-picker=\"Ctrl.dateTimeRange\" labels=\"Ctrl.dateTimeLabels\"></div>\n" +
    "                <rrule-recurring-select  rule=\"Ctrl.item.rrule\"></rrule-recurring-select>\n" +
    "            </fieldset>\n" +
    "        </div>\n" +
    "    </md-content>\n" +
    "</div>\n" +
    "");
}]);

angular.module("home/home.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("home/home.tpl.html",
    "<div ng-controller=\"HomeCtrl as Ctrl\">\n" +
    "    Probably a Cubed Menu Here\n" +
    "</div>");
}]);

angular.module("invoices/item/invoice.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("invoices/item/invoice.tpl.html",
    "invoice detail");
}]);

angular.module("invoices/items/invoices.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("invoices/items/invoices.tpl.html",
    "<md-sidenav class=\"md-sidenav-left md-whiteframe-z2\" md-component-id=\"left\" >\n" +
    "    <md-toolbar layout=\"row\">\n" +
    "        <div class=\"md-toolbar-tools\" ng-controller=\"LeftCtrl\" >\n" +
    "            <h1>Filters</h1>\n" +
    "            <span flex></span>\n" +
    "            <md-button ng-click=\"close()\" class=\"md-primary\" md-sidenav-focus>Close</md-button>\n" +
    "        </div>\n" +
    "\n" +
    "    </md-toolbar>\n" +
    "    <md-content>\n" +
    "        <md-input-container flex>\n" +
    "            <label>State</label>\n" +
    "            <md-select aria-label placeholder=\"state\" ng-model=\"Ctrl.filters.state\">\n" +
    "                <md-option ng-repeat=\"state in [{text:'current',value:1},{text:'archive',value:0}]\" value=\"{{state.value}}\">\n" +
    "                    {{state.text}}\n" +
    "                </md-option>\n" +
    "            </md-select>\n" +
    "        </md-input-container>\n" +
    "        <md-input-container flex>\n" +
    "            <label>Status</label>\n" +
    "            <md-select aria-label placeholder=\"Status\" ng-model=\"Ctrl.filters.status\">\n" +
    "                <md-option ng-repeat=\"status in Ctrl.statusOptions\" value=\"{{status.value}}\">\n" +
    "                    {{status.text}}\n" +
    "                </md-option>\n" +
    "            </md-select>\n" +
    "        </md-input-container>\n" +
    "    </md-content>\n" +
    "</md-sidenav>\n" +
    "<md-toolbar>\n" +
    "    <div class=\"md-toolbar-tools\">\n" +
    "        <md-button class=\"md-icon-button\" aria-label=\"Settings\">\n" +
    "            <md-icon md-svg-icon=\"img/icons/menu.svg\"></md-icon>\n" +
    "        </md-button>\n" +
    "        <h2>\n" +
    "            <span>Invoices </span>\n" +
    "        </h2>\n" +
    "\n" +
    "        <span flex></span>\n" +
    "        <md-button ng-click=\"Ctrl.toggleLeft()\" ng-hide=\"Ctrl.isOpenLeft()\">\n" +
    "            Toggle Filters\n" +
    "        </md-button>\n" +
    "        <md-button aria-label=\"Create Invoice\" ui-sref=\"invoices.item\">\n" +
    "            <md-icon><i class=\"material-icons\">add_circle_outline</i></md-icon>\n" +
    "        </md-button>\n" +
    "    </div>\n" +
    "</md-toolbar>\n" +
    "<md-content>\n" +
    "    <md-subheader class=\"md-4-line\" >\n" +
    "        <div layout=\"row\" layout-align=\"space-around center\" flex>\n" +
    "            <div flex=\"10\">ID      </div>\n" +
    "            <div flex=\"10\">Created </div>\n" +
    "            <div flex=\"20\">Status    </div>\n" +
    "            <div flex>Total        </div>\n" +
    "        </div>\n" +
    "    </md-subheader>\n" +
    "    <md-list ng-if=\"Ctrl.items.length\">\n" +
    "        <md-list-item class=\"md-3-line\"\n" +
    "                      dir-paginate=\"item in Ctrl.items | itemsPerPage: Ctrl.pageSize\"\n" +
    "                      current-page=\"Ctrl.currentPage\"\n" +
    "                      pagination-id=\"invoices\"\n" +
    "                      total-items=\"Ctrl.total_items\">\n" +
    "            <div flex=\"10\">\n" +
    "                <a ui-sref=\"invoices.item({id:item.id})\" >\n" +
    "                    <i class=\"fa fa-edit\"></i> {{item.id}}\n" +
    "                </a>\n" +
    "            </div>\n" +
    "            <div flex=\"10\">\n" +
    "                {{item.created * 1000 | date:'shortDate'}}\n" +
    "            </div>\n" +
    "            <div flex=\"20\">\n" +
    "                {{item.status}}\n" +
    "            </div>\n" +
    "            <div flex>\n" +
    "                {{item.total}}\n" +
    "            </div>\n" +
    "        </md-list-item>\n" +
    "    </md-list>\n" +
    "    <dir-pagination-controls ng-if=\"Ctrl.items.length\"\n" +
    "                             direction-links=\"true\"\n" +
    "                             boundary-links=\"true\"\n" +
    "                             auto-hide=\"true\"\n" +
    "                             pagination-id=\"invoices\"\n" +
    "            ></dir-pagination-controls>Page: {{Ctrl.currentPage}}\n" +
    "    <h1 ng-if=\"!Ctrl.items.length\">No Invoices To Display</h1>\n" +
    "</md-content>\n" +
    "\n" +
    "\n" +
    "");
}]);

angular.module("orders/item/item.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("orders/item/item.tpl.html",
    "<md-content>\n" +
    "    <md-toolbar>\n" +
    "        <div class=\"md-toolbar-tools\">\n" +
    "            <h2>\n" +
    "                <span>Order <span ng-if=\"Ctrl.item.id\">ID:</span>{{Ctrl.item.id}}</span>\n" +
    "            </h2>\n" +
    "            <span flex></span>\n" +
    "            <md-button aria-label=\"Add Order Item\" ng-click=\"Ctrl.saveItem()\">\n" +
    "                <md-icon><i class=\"material-icons\">check</i></md-icon>\n" +
    "            </md-button>\n" +
    "            <md-button aria-label=\"Cancel unsaved order changes and return to accounts.\" ng-click=\"Ctrl.cancelOrderChanges()\">\n" +
    "                <md-icon><i class=\"material-icons\">cancel_circle_outline</i></md-icon>\n" +
    "            </md-button>\n" +
    "        </div>\n" +
    "    </md-toolbar>\n" +
    "    <md-card>\n" +
    "        <md-card-content layout=\"row\">\n" +
    "            <div>\n" +
    "                Account ID: {{Ctrl.item.account_id}}\n" +
    "            </div>\n" +
    "            <div>\n" +
    "                Created: {{Ctrl.item.created * 1000 | date: 'shortDate'}}\n" +
    "            </div>\n" +
    "            <div>\n" +
    "                Source: {{Ctrl.item.source}}\n" +
    "            </div>\n" +
    "            <div>\n" +
    "                Total: {{Ctrl.item.total}}\n" +
    "            </div>\n" +
    "        </md-card-content>\n" +
    "    </md-card>\n" +
    "    <md-card>\n" +
    "        <md-card-content>\n" +
    "            <md-toolbar>\n" +
    "                <div class=\"md-toolbar-tools\">\n" +
    "                    <h2>\n" +
    "                        <span>Items</span>\n" +
    "                    </h2>\n" +
    "                    <span flex></span>\n" +
    "                    <md-button aria-label=\"Add Order Item\" ng-click=\"Ctrl.showProductForm()\">\n" +
    "                        <md-icon><i class=\"material-icons\">add_circle_outline</i></md-icon>\n" +
    "                    </md-button>\n" +
    "                </div>\n" +
    "            </md-toolbar>\n" +
    "            <md-card ng-if=\"Ctrl.displayProductForm\">\n" +
    "                <md-card-content>\n" +
    "                    <md-toolbar>\n" +
    "                        <div class=\"md-toolbar-tools\">\n" +
    "                            <h2>Product Form</h2>\n" +
    "                            <span flex></span>\n" +
    "                            <md-button aria-label=\"Commit Product\" ng-click=\"Ctrl.commitProductForm()\">\n" +
    "                                <md-icon><i class=\"material-icons\">check</i> </md-icon>\n" +
    "                            </md-button>\n" +
    "                            <md-button aria-label=\"Cancel Product\" ng-click=\"Ctrl.cancelProductForm()\">\n" +
    "                                <md-icon><i class=\"material-icons\">cancel_circle_outline</i></md-icon>\n" +
    "                            </md-button>\n" +
    "                        </div>\n" +
    "                    </md-toolbar>\n" +
    "                    <div ng-if=\"Ctrl.displayProductSelector\" ng-init=\"Ctrl.activateProductSelector()\">\n" +
    "                        <div id=\"productSelector\"></div>\n" +
    "                    </div>\n" +
    "                    <div ng-if=\"Ctrl.newProduct.product\">\n" +
    "                        <ng-include\n" +
    "                                ng-if=\"Ctrl.newProduct.product.config.booking.enabled\"\n" +
    "                                src=\"'orders/item/tpl/add/booking/'+Ctrl.newProduct.product.config.booking.type+'.tpl.html'\">\n" +
    "                        </ng-include>\n" +
    "                        <div ng-repeat=\"(type,payment) in Ctrl.newProduct.product.config.payment\">\n" +
    "                                <ng-include\n" +
    "                                        src=\"'orders/item/tpl/add/payment/'+type+'.tpl.html'\">\n" +
    "                                </ng-include>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </md-card-content>\n" +
    "            </md-card>\n" +
    "            <div ng-repeat=\"line_item in Ctrl.item.items\">\n" +
    "                <md-card>\n" +
    "                    <md-card-content>\n" +
    "                        <div ng-if=\"line_item.product.plugins.booking.enabled\">\n" +
    "                            <ng-include src=\"'orders/item/tpl/display/booking/'+line_item.product.plugins.booking.type+'.tpl.html'\"></ng-include>\n" +
    "                        </div>\n" +
    "                        <div ng-if=\"line_item.product.plugins.pricing.enabled\">\n" +
    "                            <ng-include src=\"'orders/item/tpl/display/pricing/'+line_item.product.plugins.pricing.type+'.tpl.html'\"></ng-include>\n" +
    "                        </div>\n" +
    "                    </md-card-content>\n" +
    "                </md-card>\n" +
    "            </div>\n" +
    "        </md-card-content>\n" +
    "    </md-card>\n" +
    "</md-content>\n" +
    "");
}]);

angular.module("orders/item/tpl/add/booking/subscription.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("orders/item/tpl/add/booking/subscription.tpl.html",
    "<md-input-container>\n" +
    "    <label>Select Child</label>\n" +
    "    <md-select ng-model=\"Ctrl.newProduct.data.child_id\">\n" +
    "        <md-option ng-repeat=\"child in Ctrl.children\" value=\"{{child.id}}\">\n" +
    "            {{child.name}}\n" +
    "        </md-option>\n" +
    "    </md-select>\n" +
    "</md-input-container>\n" +
    "<md-input-container>\n" +
    "    <label>Start Date</label>\n" +
    "    <md-select ng-model=\"Ctrl.newProduct.data.date_start\">\n" +
    "        <md-option ng-repeat=\"startdate in Ctrl.newProduct.product.plugins.booking.dateStartOptions\" value=\"{{startdate}}\">\n" +
    "            {{(startdate * 1000 | date: 'shortDate')}}\n" +
    "        </md-option>\n" +
    "    </md-select>\n" +
    "</md-input-container>\n" +
    "");
}]);

angular.module("orders/item/tpl/add/payment/paynow.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("orders/item/tpl/add/payment/paynow.tpl.html",
    "Type: Paynow<br/>\n" +
    "Required: {{payment.required}}<br/>\n" +
    "Methods:<br/>\n" +
    "<ul>\n" +
    "    <li ng-repeat=\"(type,required) in payment.methods\">{{type}}</li>\n" +
    "</ul>");
}]);

angular.module("orders/item/tpl/add/payment/recurring.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("orders/item/tpl/add/payment/recurring.tpl.html",
    "Type: Recurring<br/>\n" +
    "Required: {{payment.required}}<br/>\n" +
    "Methods:<br/>\n" +
    "<ul>\n" +
    "    <li ng-repeat=\"(type,required) in payment.methods\">{{type}}</li>\n" +
    "</ul>");
}]);

angular.module("orders/item/tpl/add/payment/subscription.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("orders/item/tpl/add/payment/subscription.tpl.html",
    "subscription payment\n" +
    "");
}]);

angular.module("orders/item/tpl/add/pricing/unitspercycle.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("orders/item/tpl/add/pricing/unitspercycle.tpl.html",
    "units per cycle pricing");
}]);

angular.module("orders/item/tpl/display/booking/subscription.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("orders/item/tpl/display/booking/subscription.tpl.html",
    "Class: {{line_item.product.title}}\n" +
    "<br/>\n" +
    "Child Name: {{Ctrl.getChildName(line_item.child_id)}}\n" +
    "<br/>\n" +
    "Start Date: {{(line_item.data.date_start * 1000 | date:'shortDate')}}\n" +
    "<br/>\n" +
    "End Date: {{(line_item.data.date_end * 1000 | date:'shortDate')}}\n" +
    "");
}]);

angular.module("orders/item/tpl/display/payment/paynow.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("orders/item/tpl/display/payment/paynow.tpl.html",
    "Class: {{line_item.product.title}}\n" +
    "<br/>\n" +
    "Child Name: {{line_item.child.name}}\n" +
    "<br/>\n" +
    "Start Date: {{(line_item.date_start * 1000 | date:'shortDate')}}\n" +
    "<br/>\n" +
    "End Date: {{(line_item.date_end * 1000 | date:'shortDate')}}\n" +
    "");
}]);

angular.module("orders/item/tpl/display/pricing/unitspercycle.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("orders/item/tpl/display/pricing/unitspercycle.tpl.html",
    "Pricing: Units Per Cycle<br/>\n" +
    "Cost Per Unit:{{line_item.price}}");
}]);

angular.module("orders/items/items.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("orders/items/items.tpl.html",
    "<md-sidenav class=\"md-sidenav-left md-whiteframe-z2\" md-component-id=\"left\" >\n" +
    "        <md-toolbar layout=\"row\">\n" +
    "            <div class=\"md-toolbar-tools\" ng-controller=\"LeftCtrl\" >\n" +
    "                <h1>Filters</h1>\n" +
    "                <span flex></span>\n" +
    "                <md-button ng-click=\"close()\" class=\"md-primary\" md-sidenav-focus>Close</md-button>\n" +
    "            </div>\n" +
    "        </md-toolbar>\n" +
    "        <md-content>\n" +
    "            <md-input-container flex>\n" +
    "                <label>State</label>\n" +
    "                <md-select aria-label placeholder=\"state\" ng-model=\"Ctrl.filters.state\">\n" +
    "                    <md-option ng-repeat=\"state in [{text:'current',value:1},{text:'archive',value:0}]\" value=\"{{state.value}}\">\n" +
    "                        {{state.text}}\n" +
    "                    </md-option>\n" +
    "                </md-select>\n" +
    "            </md-input-container>\n" +
    "            <md-input-container flex>\n" +
    "                <label>Status</label>\n" +
    "                <md-select placeholder=\"Status\" ng-model=\"Ctrl.filters.status\">\n" +
    "                    <md-option ng-repeat=\"status in Ctrl.statusOptions\" value=\"{{status.value}}\">\n" +
    "                        {{status.text}}\n" +
    "                    </md-option>\n" +
    "                </md-select>\n" +
    "            </md-input-container>\n" +
    "            <div layout=\"column\" layout-fill flex>\n" +
    "                <label>Date Range</label>\n" +
    "                <md-datepicker  ng-model=\"Ctrl.orderDate.min()\" ng-model-options=\"{getterSetter:true}\" md-placeholder=\"Min\" layout-fill flex></md-datepicker>\n" +
    "                <md-datepicker  ng-model=\"Ctrl.orderDate.max()\" ng-model-options=\"{getterSetter:true}\" md-placeholder=\"Max\" layout-fill flex></md-datepicker>\n" +
    "            </div>\n" +
    "            <div layout=\"column\" flex>\n" +
    "                <label>Total Range</label>\n" +
    "                <div layout=\"row\">\n" +
    "                    <md-input-container flex>\n" +
    "                        <label>Min</label>\n" +
    "                        <input ng-model=\"Ctrl.filters.orderTotal.min\"/>\n" +
    "                    </md-input-container>\n" +
    "                    <md-input-container flex>\n" +
    "                        <label>Max</label>\n" +
    "                        <input ng-model=\"Ctrl.filters.orderTotal.max\"/>\n" +
    "                    </md-input-container>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div ng-controller=\"ParentSearchCtrl as Ctrl\">\n" +
    "                <label>Parent Name</label>\n" +
    "                <md-autocomplete\n" +
    "                        md-delay=\"500\"\n" +
    "                        ng-disabled=\"false\"\n" +
    "                        md-no-cache=\"false\"\n" +
    "                        md-selected-item=\"Ctrl.parent\"\n" +
    "                        md-search-text-change=\"Ctrl.searchTextChange(Ctrl.searchText)\"\n" +
    "                        md-search-text=\"Ctrl.searchText\"\n" +
    "                        md-selected-item-change=\"Ctrl.selectedItemChange(item)\"\n" +
    "                        md-items=\"item in Ctrl.querySearch(Ctrl.searchText)\"\n" +
    "                        md-item-text=\"item.f_name + ' ' + item.l_name\"\n" +
    "                        md-min-length=\"0\"\n" +
    "                        placeholder=\"Parent Name\">\n" +
    "                    <md-item-template>\n" +
    "                        <span md-highlight-text=\"Ctrl.searchText\" md-highlight-flags=\"^i\">{{item.f_name}} {{item.l_name}}</span>\n" +
    "                    </md-item-template>\n" +
    "                    <md-not-found>\n" +
    "                        No matches found.\n" +
    "                    </md-not-found>\n" +
    "                </md-autocomplete>\n" +
    "            </div>\n" +
    "        </md-content>\n" +
    "    </md-sidenav>\n" +
    "    <md-toolbar>\n" +
    "        <div class=\"md-toolbar-tools\">\n" +
    "            <md-button class=\"md-icon-button\" aria-label=\"Settings\">\n" +
    "                <md-icon md-svg-icon=\"img/icons/menu.svg\"></md-icon>\n" +
    "            </md-button>\n" +
    "            <h2>\n" +
    "                <span>Orders</span>\n" +
    "            </h2>\n" +
    "            <span flex></span>\n" +
    "            <md-button ng-click=\"Ctrl.toggleLeft()\" ng-hide=\"Ctrl.isOpenLeft()\">\n" +
    "                Toggle Filters\n" +
    "            </md-button>\n" +
    "            <md-button aria-label=\"Create Order\" ui-sref=\"orders.item\">\n" +
    "                <md-icon><i class=\"material-icons\">add_circle_outline</i></md-icon>\n" +
    "            </md-button>\n" +
    "        </div>\n" +
    "    </md-toolbar>\n" +
    "    <md-content>\n" +
    "        <md-subheader class=\"md-1-line\">\n" +
    "            <div layout=\"row\" flex>\n" +
    "                <div flex=\"5\"></div>\n" +
    "                <div flex=\"20\">\n" +
    "                    Created\n" +
    "                </div>\n" +
    "                <div flex=\"20\">\n" +
    "                    Parent\n" +
    "                </div>\n" +
    "                <div flex>\n" +
    "                    Total\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </md-subheader>\n" +
    "        <md-divider class=\"md-1-line\"></md-divider>\n" +
    "        <md-list ng-if=\"Ctrl.items.length\">\n" +
    "            <md-list-item  class=\"md-3-line\"\n" +
    "                           dir-paginate=\"item in Ctrl.items | itemsPerPage: Ctrl.pageSize\"\n" +
    "                           current-page=\"Ctrl.currentPage\"\n" +
    "                           pagination-id=\"orders\"\n" +
    "                           total-items=\"Ctrl.total_items\">\n" +
    "                <div flex=\"5\">\n" +
    "                    <a ui-sref=\"orders.item({id:item.id})\" >\n" +
    "                        <i class=\"fa fa-edit\"></i>\n" +
    "                    </a>\n" +
    "                </div>\n" +
    "                <div flex=\"20\">\n" +
    "                    {{item.created * 1000 | date:'dd/MM/yyyy'}}\n" +
    "                </div>\n" +
    "                <div flex=\"20\">\n" +
    "                    {{item.parent.f_name+' '+item.parent.l_name}}\n" +
    "                </div>\n" +
    "                <div flex>\n" +
    "                    {{item.total}}\n" +
    "                </div>\n" +
    "\n" +
    "            </md-list-item>\n" +
    "        </md-list>\n" +
    "        <dir-pagination-controls ng-if=\"Ctrl.items.length\"\n" +
    "                                 direction-links=\"true\"\n" +
    "                                 boundary-links=\"true\"\n" +
    "                                 auto-hide=\"true\"\n" +
    "                                 pagination-id=\"orders\"\n" +
    "                ></dir-pagination-controls>\n" +
    "        <h1 ng-if=\"!Ctrl.items.length\">No Orders To Display</h1>\n" +
    "    </md-content>\n" +
    "");
}]);

angular.module("parents/item/item.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("parents/item/item.tpl.html",
    "<md-toolbar  md-scroll-shrink>\n" +
    "    <div class=\"md-toolbar-tools\">\n" +
    "        <md-button class=\"md-icon-button\" aria-label=\"Settings\">\n" +
    "            <md-icon md-svg-icon=\"img/icons/menu.svg\"></md-icon>\n" +
    "        </md-button>\n" +
    "        <h2>\n" +
    "            Parent Detail: {{ Ctrl.item.title || '' }} {{Ctrl.item.juser.name || '' }}\n" +
    "        </h2>\n" +
    "        <span flex></span>\n" +
    "        <div>\n" +
    "            <md-button tooltip=\"Save Current Item State\"\n" +
    "                       tooltip-placement=\"left\"\n" +
    "                       class=\"md-icon-button\"\n" +
    "                       aria-label=\"Save\"\n" +
    "                       ng-click=\"Ctrl.saveItem()\">\n" +
    "                <md-icon><i class=\"material-icons\">check</i></md-icon>\n" +
    "            </md-button>\n" +
    "\n" +
    "            <md-button class=\"md-icon-button\"\n" +
    "                       tooltip=\"Close Current Item\"\n" +
    "                       tooltip-placement=\"left\"\n" +
    "                       aria-label=\"More\"\n" +
    "                       ng-click=\"Ctrl.cancelItem()\">\n" +
    "                <md-icon> <i class=\"material-icons\">cancel_circle_outline</i> </md-icon>\n" +
    "            </md-button>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</md-toolbar>\n" +
    "<div layout=\"row\" id=\"parentItemContainer\"  flex>\n" +
    "    <md-content class=\"md-whiteframe-1dp\" flex>\n" +
    "        <md-card>\n" +
    "            <div flex>\n" +
    "                <img class=\"parentProfilePicture\" ng-src=\"/images/parents/{{Ctrl.item.image}}\"/>\n" +
    "            </div>\n" +
    "            <div flex>\n" +
    "                <label class=\"col-md-4 control-label\">Account ID</label>\n" +
    "                {{ Ctrl.item.account_id || 'Not Set' }}\n" +
    "            </div>\n" +
    "            <md-input-container layout=\"row\" flex>\n" +
    "                <label>Title</label>\n" +
    "                <md-select ng-model=\"Ctrl.item.title\">\n" +
    "                    <md-option ng-repeat=\"o in Ctrl.titleOptions\" value=\"{{o.value}}\">\n" +
    "                        {{o.text}}\n" +
    "                    </md-option>\n" +
    "                </md-select>\n" +
    "            </md-input-container>\n" +
    "            <md-input-container layout=\"row\" flex>\n" +
    "                <label>First name</label>\n" +
    "                <input ng-model=\"Ctrl.item.f_name\"/>\n" +
    "            </md-input-container>\n" +
    "            <md-input-container layout=\"row\" flex>\n" +
    "                <label>Last Name</label>\n" +
    "                <input ng-model=\"Ctrl.item.l_name\"/>\n" +
    "            </md-input-container>\n" +
    "            <md-input-container layout=\"row\" flex>\n" +
    "                <label>Email</label>\n" +
    "                <input ng-model=\"Ctrl.item.email\"/>\n" +
    "            </md-input-container>\n" +
    "            <md-input-container layout=\"row\" flex>\n" +
    "                <label>Home Phone</label>\n" +
    "                <input ng-model=\"Ctrl.item.phone_home\"/>\n" +
    "            </md-input-container>\n" +
    "            <md-input-container layout=\"row\" flex>\n" +
    "                <label>Work Phone</label>\n" +
    "                <input ng-model=\"Ctrl.item.phone_work\"/>\n" +
    "            </md-input-container>\n" +
    "            <md-input-container layout=\"row\" flex>\n" +
    "                <label>Mobile Phone</label>\n" +
    "                <input ng-model=\"Ctrl.item.phone_mobile\"/>\n" +
    "            </md-input-container>\n" +
    "        </md-card>\n" +
    "        <md-card>\n" +
    "            <h3>Address</h3>\n" +
    "            <div class=\"form-control-group\">\n" +
    "                <md-input-container layout=\"row\" flex>\n" +
    "                    <label>Address 1</label>\n" +
    "                    <input ng-model=\"Ctrl.item.address_street1\"/>\n" +
    "                </md-input-container>\n" +
    "                <md-input-container layout=\"row\" flex>\n" +
    "                    <label>Address 2</label>\n" +
    "                    <input ng-model=\"Ctrl.item.address_street2\"/>\n" +
    "                </md-input-container>\n" +
    "                <md-input-container layout=\"row\" flex>\n" +
    "                    <label>City</label>\n" +
    "                    <md-select ng-model=\"Ctrl.item.title\">\n" +
    "                        <md-option ng-repeat=\"o in Ctrl.cityOptions\" value=\"{{o.value}}\">\n" +
    "                            {{o.text}}\n" +
    "                        </md-option>\n" +
    "                    </md-select>\n" +
    "                </md-input-container>\n" +
    "                <md-input-container layout=\"row\" flex>\n" +
    "                    <label>Region</label>\n" +
    "                    <md-select ng-model=\"Ctrl.item.state\">\n" +
    "                        <md-option ng-repeat=\"o in Ctrl.stateOptions\" value=\"{{o.value}}\">\n" +
    "                            {{o.text}}\n" +
    "                        </md-option>\n" +
    "                    </md-select>\n" +
    "                </md-input-container>\n" +
    "                <md-input-container layout=\"row\" flex>\n" +
    "                    <label>Postal Code</label>\n" +
    "                    <input ng-model=\"Ctrl.item.address_postalcode\"/>\n" +
    "                </md-input-container>\n" +
    "                <md-input-container layout=\"row\" flex>\n" +
    "                    <label>Region</label>\n" +
    "                    <md-select ng-model=\"Ctrl.item.state\">\n" +
    "                        <md-option ng-repeat=\"o in Ctrl.countryOptions\" value=\"{{o.value}}\">\n" +
    "                            {{o.text}}\n" +
    "                        </md-option>\n" +
    "                    </md-select>\n" +
    "                </md-input-container>\n" +
    "            </div>\n" +
    "        </md-card>\n" +
    "\n" +
    "\n" +
    "            <div class=\"form-group\">\n" +
    "                <label class=\"col-md-4 control-label\">Archived?</label>\n" +
    "                <md-switch class=\"md-primary md-block\" aria-label=\"Switch No Ink\"\n" +
    "                           ng-model=\"Ctrl.item.state\" ng-true-value='\"0\"' ng-false-value='\"1\"'>{{Ctrl.item.state || '1' | yesno:'true'}}</md-switch>\n" +
    "            </div>\n" +
    "\n" +
    "            <div class=\"form-group\">\n" +
    "                <label class=\"col-md-4 control-label\">SMS</label>\n" +
    "                <md-switch class=\"md-primary md-block\" aria-label=\"Switch No Ink\"\n" +
    "                           ng-model=\"Ctrl.item.sms\" ng-true-value='\"1\"' ng-false-value='\"0\"'>{{Ctrl.item.sms | yesno}}</md-switch>\n" +
    "            </div>\n" +
    "            <md-card layout-margin ng-if=\"Ctrl.showChildren\">\n" +
    "                <md-card-content>\n" +
    "                    <md-toolbar>\n" +
    "                        <div class=\"md-toolbar-tools\">\n" +
    "                            <h2>\n" +
    "                                <span>Children</span>\n" +
    "                            </h2>\n" +
    "                            <span flex></span>\n" +
    "                            <md-button aria-label=\"Add Child\" ng-click=\"Ctrl.showAddChildForm()\">\n" +
    "                                <md-icon><i class=\"material-icons\">add_circle_outline</i></md-icon>\n" +
    "                            </md-button>\n" +
    "                        </div>\n" +
    "                    </md-toolbar>\n" +
    "                    <md-content layout-margin ng-if=\"Ctrl.addChildForm\">\n" +
    "                        <div class=\"form-group\">\n" +
    "                            <label class=\"col-md-4 control-label\">Name</label>\n" +
    "                            <a href=\"#\" editable-text=\"Ctrl.newChild.name\">\n" +
    "                                {{ Ctrl.newChild.name || '_____'}}\n" +
    "                            </a>\n" +
    "                        </div>\n" +
    "                        <div class=\"form-group\">\n" +
    "                            <label class=\"col-md-4 control-label\">DOB</label>\n" +
    "                            <div class=\"col-md-6\">\n" +
    "                                <p class=\"input-group\">\n" +
    "                                    <input type=\"text\" class=\"form-control\" uib-datepicker-popup=\"d/M/yyyy\" ng-model=\"Ctrl.newChild.dob\" is-open=\"Ctrl.uibCalendarStatus.opened\"   ng-required=\"true\" close-text=\"Close\" />\n" +
    "                                    <span class=\"input-group-btn\">\n" +
    "                                        <button type=\"button\" class=\"btn btn-default\" ng-click=\"Ctrl.open($event)\"><i class=\"glyphicon glyphicon-calendar\"></i></button>\n" +
    "                                    </span>\n" +
    "                                </p>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                        <md-button aria-label=\"Commit Child\" ng-click=\"Ctrl.commitChildForm()\">\n" +
    "                            <md-icon><i class=\"material-icons\">check</i> </md-icon>\n" +
    "                        </md-button>\n" +
    "                        <md-button aria-label=\"Cancel Child\" ng-click=\"Ctrl.cancelAddChildForm()\">\n" +
    "                            <md-icon><i class=\"material-icons\">cancel_circle_outline</i></md-icon>\n" +
    "                        </md-button>\n" +
    "                        <md-divider class=\"md-3-line\"></md-divider>\n" +
    "                    </md-content>\n" +
    "\n" +
    "                    <md-content layout-margin>\n" +
    "                        <md-list ng-if=\"Ctrl.item.children.length\">\n" +
    "                            <md-list-item  class=\"md-3-line\" ng-repeat=\"child in Ctrl.item.children\">\n" +
    "                                <div class=\"col-xs-9 col-sm-9 col-md-9\"  ng-click=\"Ctrl.editChild($index)\">\n" +
    "                                    <div class=\"col-xs-12 col-sm-6 col-md-6\">\n" +
    "                                        {{child.name}}\n" +
    "                                    </div>\n" +
    "                                    <div class=\"col-xs-12 col-sm-6 col-md-6\">\n" +
    "                                        {{child.dob | date:'shortDate' }}\n" +
    "                                    </div>\n" +
    "                                </div>\n" +
    "\n" +
    "                                <div class=\"col-xs-12 col-sm-3 col-md-3\">\n" +
    "                                    <md-button ng-click=\"Ctrl.removeChild($index)\">\n" +
    "                                        <md-icon><i class=\"material-icons\">cancel_circle_outline</i></md-icon>\n" +
    "                                    </md-button>\n" +
    "                                </div>\n" +
    "                            </md-list-item>\n" +
    "                        </md-list>\n" +
    "                        <h1 ng-if=\"!Ctrl.item.children.length\">No Children To Display</h1>\n" +
    "                    </md-content>\n" +
    "                </md-card-content>\n" +
    "            </md-card>\n" +
    "        </section>\n" +
    "    </md-content>\n" +
    "</div>\n" +
    "");
}]);

angular.module("parents/items/items.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("parents/items/items.tpl.html",
    "<md-sidenav class=\"md-sidenav-left md-whiteframe-z2\" md-component-id=\"left\" >\n" +
    "    <md-toolbar layout=\"row\">\n" +
    "        <div class=\"md-toolbar-tools\" ng-controller=\"LeftCtrl\" >\n" +
    "            <h1>Filters</h1>\n" +
    "            <span flex></span>\n" +
    "            <md-button ng-click=\"close()\" class=\"md-primary\" md-sidenav-focus>Close</md-button>\n" +
    "        </div>\n" +
    "    </md-toolbar>\n" +
    "    <md-content>\n" +
    "        <md-input-container flex>\n" +
    "            <label>State</label>\n" +
    "            <md-select aria-label placeholder=\"state\" ng-model=\"Ctrl.filters.state\">\n" +
    "                <md-option ng-repeat=\"state in [{text:'current',value:1},{text:'archive',value:0}]\" value=\"{{state.value}}\">\n" +
    "                    {{state.text}}\n" +
    "                </md-option>\n" +
    "            </md-select>\n" +
    "        </md-input-container>\n" +
    "        <md-input-container flex>\n" +
    "            <label>Status</label>\n" +
    "            <md-select placeholder=\"Status\" ng-model=\"Ctrl.filters.status\">\n" +
    "                <md-option ng-repeat=\"status in Ctrl.statusOptions\" value=\"{{status.value}}\">\n" +
    "                    {{status.text}}\n" +
    "                </md-option>\n" +
    "            </md-select>\n" +
    "        </md-input-container>\n" +
    "        <md-input-container>\n" +
    "            <lable>Mobile Number</lable>\n" +
    "            <input ng-model=\"Ctrl.filters.phone_mobile\"></input>\n" +
    "        </md-input-container>\n" +
    "        <md-input-container ng-controller=\"ParentSearchCtrl as Ctrl\">\n" +
    "            <label>Paren Name</label>\n" +
    "            <md-autocomplete\n" +
    "                    md-delay=\"500\"\n" +
    "                    ng-disabled=\"false\"\n" +
    "                    md-no-cache=\"false\"\n" +
    "                    md-selected-item=\"Ctrl.parent\"\n" +
    "                    md-search-text-change=\"Ctrl.searchTextChange(Ctrl.searchText)\"\n" +
    "                    md-search-text=\"Ctrl.searchText\"\n" +
    "                    md-selected-item-change=\"Ctrl.selectedItemChange(item)\"\n" +
    "                    md-items=\"item in Ctrl.querySearch(Ctrl.searchText)\"\n" +
    "                    md-item-text=\"item.f_name + ' ' + item.l_name\"\n" +
    "                    md-min-length=\"0\">\n" +
    "                <md-item-template>\n" +
    "                    <span md-highlight-text=\"Ctrl.searchText\" md-highlight-flags=\"^i\">{{item.f_name}} {{item.l_name}}</span>\n" +
    "                </md-item-template>\n" +
    "                <md-not-found>\n" +
    "                    No parents matching \"{{Ctrl.parentSearchText}}\" were found.<br/>\n" +
    "                    <a ng-click=\"angular.noop()\">Create a new one!(Coming Soon)</a>\n" +
    "                </md-not-found>\n" +
    "            </md-autocomplete>\n" +
    "        </md-input-container>\n" +
    "    </md-content>\n" +
    "</md-sidenav>\n" +
    "<md-toolbar>\n" +
    "    <div class=\"md-toolbar-tools\">\n" +
    "        <md-button class=\"md-icon-button\" aria-label=\"Settings\">\n" +
    "            <md-icon md-svg-icon=\"img/icons/menu.svg\"></md-icon>\n" +
    "        </md-button>\n" +
    "        <h2>\n" +
    "            <span>Parents</span>\n" +
    "        </h2>\n" +
    "        <span flex></span>\n" +
    "        <md-button ng-click=\"Ctrl.toggleLeft()\" ng-hide=\"Ctrl.isOpenLeft()\">\n" +
    "            Toggle Filters\n" +
    "        </md-button>\n" +
    "        <md-button class=\"md-icon-button\" aria-label=\"add\"  ui-sref=\"parents.item\">\n" +
    "            <md-icon><i class=\"material-icons\">add_circle_outline</i></md-icon>\n" +
    "        </md-button>\n" +
    "    </div>\n" +
    "</md-toolbar>\n" +
    "<md-content flex>\n" +
    "    <md-subheader class=\"md-4-line\" >\n" +
    "        <div layout=\"row\" layout-align=\"space-around center\" flex>\n" +
    "            <div flex=\"4\"></div>\n" +
    "            <div flex=\"10\">Created      </div>\n" +
    "            <div flex=\"20\">Name         </div>\n" +
    "            <div flex=\"20\">Mobile #     </div>\n" +
    "            <div flex>Email             </div>\n" +
    "        </div>\n" +
    "    </md-subheader>\n" +
    "    <md-list ng-if=\"Ctrl.items.length\">\n" +
    "        <md-list-item class=\"md-1-line\" class=\"md-3-line\"\n" +
    "                      dir-paginate=\"item in Ctrl.items | itemsPerPage: Ctrl.pageSize\"\n" +
    "                      current-page=\"Ctrl.currentPage\"\n" +
    "                      pagination-id=\"orders\"\n" +
    "                      total-items=\"Ctrl.total_items\">\n" +
    "            <div layout=\"row\" layout-align=\"space-around center\" flex>\n" +
    "                <div flex=\"4\">\n" +
    "                    <a ui-sref=\"parents.item({id:item.id})\">\n" +
    "                        <i class=\"fa fa-edit\"></i>\n" +
    "                    </a>\n" +
    "                </div>\n" +
    "                <div flex=\"10\">\n" +
    "                    {{item.created * 1000 | date:'shortDate' }}\n" +
    "                </div>\n" +
    "                <div flex=\"20\">\n" +
    "                    <a ui-sref=\"parents.item({id:item.id})\">\n" +
    "                        {{item.juser.name}}\n" +
    "                    </a>\n" +
    "                </div>\n" +
    "                <div flex=\"20\">\n" +
    "                    {{item.phone_mobile}}\n" +
    "                </div>\n" +
    "                <div flex>\n" +
    "                    {{item.juser.email}}\n" +
    "                </div>\n" +
    "\n" +
    "            </div>\n" +
    "        </md-list-item>\n" +
    "    </md-list>\n" +
    "    <dir-pagination-controls ng-if=\"Ctrl.items.length\"\n" +
    "                             direction-links=\"true\"\n" +
    "                             boundary-links=\"true\"\n" +
    "                             auto-hide=\"true\"\n" +
    "                             pagination-id=\"orders\"\n" +
    "            ></dir-pagination-controls>\n" +
    "    <div class=\"empty_result\">\n" +
    "        <h1 ng-if=\"!Ctrl.items.length\">No Parents To Display</h1>\n" +
    "    </div>\n" +
    "</md-content>");
}]);

angular.module("payments/item/item.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("payments/item/item.tpl.html",
    "<div class=\"jumbotron\">\n" +
    "  <h1>Non-Trivial AngularJS Made Easy</h1>\n" +
    "\n" +
    "  <p class=\"lead\">\n" +
    "    Everything you need to kickstart AngularJS projects: a best-practice\n" +
    "    directory structure, an intelligent build system, and the best web design\n" +
    "    libraries around.\n" +
    "  </p>\n" +
    "\n" +
    "  <ul class=\"list-inline social-buttons\">\n" +
    "    <li>\n" +
    "      <iframe \n" +
    "        src=\"http://ghbtns.com/github-btn.html?user=ngbp&amp;repo=ngbp&amp;type=watch&amp;count=true\" \n" +
    "        allowtransparency=\"true\" \n" +
    "        frameborder=\"0\" \n" +
    "        scrolling=\"0\" \n" +
    "        width=\"110\" \n" +
    "        height=\"20\">\n" +
    "      </iframe>\n" +
    "    </li>\n" +
    "    <li>\n" +
    "      <iframe \n" +
    "        src=\"http://ghbtns.com/github-btn.html?user=ngbp&amp;repo=ngbp&amp;type=fork&amp;count=true\" \n" +
    "        allowtransparency=\"true\" \n" +
    "        frameborder=\"0\" \n" +
    "        scrolling=\"0\" \n" +
    "        width=\"95\" \n" +
    "        height=\"20\">\n" +
    "      </iframe>\n" +
    "    </li>\n" +
    "    <li>\n" +
    "       <iframe allowtransparency=\"true\" frameborder=\"0\" scrolling=\"no\"\n" +
    "        src=\"https://platform.twitter.com/widgets/tweet_button.html?url=http%3A%2F%2Fbit.ly%2FngBoilerplate&counturl=http%3A%2F%2Fngbp.github.com%2Fngbp&text=Check%20out%20%23ngbp%20-%20an%20awesome%20kickstarter%20for%20web%20projects%20%7C&hashtags=angularjs&via=joshdmiller&related=joshdmiller\"\n" +
    "        style=\"width:130px; height:20px;\"></iframe>\n" +
    "    </li>\n" +
    "    <li plus-one></li>\n" +
    "  </ul> \n" +
    "  \n" +
    "  <div class=\"btn-group\">\n" +
    "    <a href=\"https://github.com/ngbp/ngbp#readme\" class=\"btn btn-large btn-default\">\n" +
    "      <i class=\"fa fa-book\"></i>\n" +
    "      Read the Docs\n" +
    "    </a>\n" +
    "    <a href=\"https://github.com/ngbp/ngbp\" class=\"btn btn-large btn-success\">\n" +
    "      <i class=\"fa fa-download\"></i>\n" +
    "      Download\n" +
    "    </a>\n" +
    "  </div>\n" +
    "\n" +
    "</div>\n" +
    "\n" +
    "<div class=\"marketing\">\n" +
    "  <div class=\"row\">\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-thumbs-up\"></i> Good to Go!</h4>\n" +
    "      <p>\n" +
    "        Kickstarts your project quickly, with everything you need, so you can \n" +
    "        focus on what matters: your app.\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-magic\"></i> Complete Build System</h4>\n" +
    "      <p>\n" +
    "        A smart, <a href=\"http://gruntjs.com\">Grunt</a>-based build system \n" +
    "        designed to save you time and energy.\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-retweet\"></i> Modularization</h4>\n" +
    "      <p>\n" +
    "        Supports a structure that maintains separation of concerns while\n" +
    "        ensuring maximum code reuse.\n" +
    "      </p>\n" +
    "    </div>\n" +
    "  </div>\n" +
    "  <div class=\"row\">\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-star\"></i> AngularJS</h4>\n" +
    "      <p>\n" +
    "        JavaScript framework that augments browser-based, single-page \n" +
    "        applications with MVC functionality.\n" +
    "        <a href=\"http://angularjs.org\">More &raquo;</a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-resize-small\"></i> LESS CSS</h4>\n" +
    "      <p>\n" +
    "        The dynamic stylesheet language that extends CSS with efficiency.\n" +
    "        <a href=\"http://lesscss.org\">More &raquo;</a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-twitter\"></i> Twitter Bootstrap</h4>\n" +
    "      <p>\n" +
    "        Sleek, intuitive, and powerful front-end framework for faster and easier\n" +
    "        web development.\n" +
    "        <a href=\"http://getbootstrap.com\">More &raquo;</a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "  </div>\n" +
    "  <div class=\"row\">\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-circle\"></i> Angular UI Bootstrap</h4>\n" +
    "      <p>\n" +
    "        Pure AngularJS components for Bootstrap written by the \n" +
    "        <a href=\"https://github.com/angular-ui?tab=members\">AngularUI Team</a>.\n" +
    "        <a href=\"http://angular-ui.github.com/bootstrap\">More &raquo;</a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-flag\"></i> Font Awesome</h4>\n" +
    "      <p>\n" +
    "        The iconic font designed for use with Twitter Bootstrap.\n" +
    "        <a href=\"http://fortawesome.github.com/Font-Awesome\">\n" +
    "          More &raquo;\n" +
    "        </a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-asterisk\"></i> Placeholders</h4>\n" +
    "      <p>\n" +
    "        Client-side image and text placeholder directives written in pure \n" +
    "        AngularJS to make designing mock-ups wicked-fast.\n" +
    "        <a href=\"http://joshdmiller.github.com/angular-placeholders\">\n" +
    "          More &raquo;\n" +
    "        </a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "  </div>\n" +
    "</div>\n" +
    "\n" +
    "");
}]);

angular.module("payments/payments.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("payments/payments.tpl.html",
    "<md-toolbar>\n" +
    "        <div class=\"md-toolbar-tools\">\n" +
    "            <md-button class=\"md-icon-button\" aria-label=\"Settings\">\n" +
    "                <md-icon md-svg-icon=\"img/icons/menu.svg\"></md-icon>\n" +
    "            </md-button>\n" +
    "            <h2>\n" +
    "                <span>Payments</span>\n" +
    "            </h2>\n" +
    "            <span flex></span>\n" +
    "            <md-button aria-label=\"Create Order\" ui-sref=\"orders.item\">\n" +
    "                <md-icon><i class=\"material-icons\">add_circle_outline</i></md-icon>\n" +
    "            </md-button>\n" +
    "        </div>\n" +
    "    </md-toolbar>\n" +
    "    <md-content>\n" +
    "        <md-list ng-if=\"Ctrl.items.length\">\n" +
    "            <md-grid-list class=\"col-xs-12\">\n" +
    "                <md-grid-tile-header class=\"col-xs-3\">Payment Id</md-grid-tile-header>\n" +
    "                <md-grid-tile-header class=\"col-xs-3\">Created</md-grid-tile-header>\n" +
    "                <md-grid-tile-header class=\"col-xs-3\">Invoice Id</md-grid-tile-header>\n" +
    "                <md-grid-tile-header class=\"col-xs-3\">Amount</md-grid-tile-header>\n" +
    "            </md-grid-list>\n" +
    "\n" +
    "            <md-list-item  ng-repeat=\"item in Ctrl.items\">\n" +
    "                <md-grid-list class=\"col-xs-12\">\n" +
    "                    <md-grid-tile class=\"col-xs-3\">{{item.id}}</md-grid-tile>\n" +
    "                    <md-grid-tile class=\"col-xs-3\">{{item.created}}</md-grid-tile>\n" +
    "                    <md-grid-tile class=\"col-xs-3\">{{item.invoice_id}}</md-grid-tile>\n" +
    "                    <md-grid-tile class=\"col-xs-3\">{{item.amount}}</md-grid-tile>\n" +
    "                </md-grid-list>\n" +
    "            </md-list-item>\n" +
    "        </md-list>\n" +
    "        <h1 ng-if=\"!Ctrl.items.length\">No Payments To Display</h1>\n" +
    "    </md-content>\n" +
    "");
}]);

angular.module("products/item/event/item/item.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("products/item/event/item/item.tpl.html",
    "<div ng-controller=\"ProductsItemEventCtrl as Ctrl\">\n" +
    "    <md-toolbar>\n" +
    "        <div class=\"md-toolbar-tools\">\n" +
    "            <md-button class=\"md-icon-button\" aria-label=\"Settings\">\n" +
    "                <md-icon md-svg-icon=\"img/icons/menu.svg\"></md-icon>\n" +
    "            </md-button>\n" +
    "            <h2>\n" +
    "                Event Detail:{{ Ctrl.item.product_id || 'PRODUCT TITLE' }} at\n" +
    "                <a href=\"#\" editable-select=\"Ctrl.item.venue_id\" e-ng-options=\"o.id as o.title for o in Ctrl.venueOptions\">\n" +
    "                    {{ Ctrl.showVenue() || 'SELECT VENUE' }}\n" +
    "                </a>\n" +
    "            </h2>\n" +
    "            <span flex></span>\n" +
    "            <md-button class=\"md-icon-button\" aria-label=\"Favorite\">\n" +
    "                <md-icon md-svg-icon=\"img/icons/favorite.svg\"></md-icon>\n" +
    "            </md-button>\n" +
    "            <md-button class=\"md-icon-button\" aria-label=\"More\" ng-click=\"Ctrl.saveItem()\">\n" +
    "                <md-icon><i class=\"material-icons\">check</i></md-icon>\n" +
    "            </md-button>\n" +
    "\n" +
    "        </div>\n" +
    "    </md-toolbar>\n" +
    "    <div class=\"form-horizontal\">\n" +
    "        <div class=\"form-group\">\n" +
    "            <label class=\"col-md-4 control-label\">Cost Modifier:</label>\n" +
    "            <a href=\"#\" class=\"form-control input-sm\"  editable-text=\"Ctrl.item.costmod\">\n" +
    "                {{ Ctrl.item.costmod || 'Cost Modifier' }}\n" +
    "            </a>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>\n" +
    "");
}]);

angular.module("products/item/event/items/items.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("products/item/event/items/items.tpl.html",
    "<div ng-controller=\"ProductsItemEventsCtrl as Ctrl\">\n" +
    "    <md-toolbar>\n" +
    "        <div class=\"md-toolbar-tools\">\n" +
    "            <md-button class=\"md-icon-button\" aria-label=\"Settings\">\n" +
    "                <md-icon md-svg-icon=\"img/icons/menu.svg\"></md-icon>\n" +
    "            </md-button>\n" +
    "            <h2>\n" +
    "                <span>Product Events</span>\n" +
    "            </h2>\n" +
    "            <span flex></span>\n" +
    "            <md-button class=\"md-icon-button\" aria-label=\"Favorite\">\n" +
    "                <md-icon md-svg-icon=\"img/icons/favorite.svg\"></md-icon>\n" +
    "            </md-button>\n" +
    "            <md-button class=\"md-icon-button\" aria-label=\"More\" ui-sref=\"products.item.event\">\n" +
    "                <md-icon><i class=\"material-icons\">add_circle_outline</i></md-icon>\n" +
    "            </md-button>\n" +
    "        </div>\n" +
    "    </md-toolbar>\n" +
    "    <md-content flex>\n" +
    "        <md-list ng-if=\"Ctrl.items.length\">\n" +
    "            <md-list-item class=\"md-3-line\" ng-repeat=\"item in Ctrl.items\">\n" +
    "                <div class=\"col-xs-12 col-sm-6 col-md-6\">\n" +
    "                    <h4>\n" +
    "                        <a ui-sref=\"products.item.event({id:item.id})\" >\n" +
    "                            <i class=\"fa fa-edit\"></i> {{item.title}}\n" +
    "                        </a>\n" +
    "                    </h4>\n" +
    "                </div>\n" +
    "                <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "                    <h4>{{item.data}}</h4>\n" +
    "                </div>\n" +
    "            </md-list-item>\n" +
    "        </md-list>\n" +
    "        <h1 ng-if=\"!Ctrl.items.length\">No events to display for this product.</h1>\n" +
    "    </md-content>\n" +
    "</div>");
}]);

angular.module("products/item/item.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("products/item/item.tpl.html",
    "<div class=\"layout-fill layout-column\">\n" +
    "    <md-toolbar>\n" +
    "        <div class=\"md-toolbar-tools\">\n" +
    "            <md-button class=\"md-icon-button\" aria-label=\"Settings\">\n" +
    "                <md-icon md-svg-icon=\"img/icons/menu.svg\"></md-icon>\n" +
    "            </md-button>\n" +
    "            <h2>\n" +
    "                <div class=\"form-horizontal\">\n" +
    "                    Product Name:\n" +
    "                    <a href=\"#\" editable-text=\"Ctrl.item.title\">\n" +
    "                        {{ Ctrl.item.title || Ctrl.buildProductName() }}\n" +
    "                    </a>\n" +
    "                </div>\n" +
    "            </h2>\n" +
    "            <span flex></span>\n" +
    "\n" +
    "            <md-button tooltip=\"Save Current Item State\"\n" +
    "                       tooltip-placement=\"left\"\n" +
    "                       class=\"md-icon-button\"\n" +
    "                       aria-label=\"Save\"\n" +
    "                       ng-click=\"Ctrl.saveItem()\">\n" +
    "                <md-icon><i class=\"material-icons\">check</i></md-icon>\n" +
    "            </md-button>\n" +
    "            <div class=\"test\">\n" +
    "                <md-button class=\"md-icon-button md-warn\"\n" +
    "                           tooltip=\"Delete Current Item\"\n" +
    "                           tooltip-placement=\"left\"\n" +
    "                           aria-label=\"More\"\n" +
    "                           ng-click=\"Ctrl.deleteItem()\">\n" +
    "                    <md-icon> <i class=\"material-icons\">delete</i> </md-icon>\n" +
    "                </md-button>\n" +
    "            </div>\n" +
    "\n" +
    "        </div>\n" +
    "    </md-toolbar>\n" +
    "    <md-content layout-padding layout=\"column\" flex>\n" +
    "            <md-card>\n" +
    "                <div class=\"md-card-content\">\n" +
    "                    <md-input-container layout=\"row\" flex>\n" +
    "                        <label>Description</label>\n" +
    "                        <input ng-model=\"Ctrl.item.description\"/>\n" +
    "                    </md-input-container>\n" +
    "                    <md-input-container layout=\"row\" flex>\n" +
    "                        <label>Category</label>\n" +
    "                        <md-select ng-model=\"Ctrl.item.category_id\">\n" +
    "                            <md-option ng-repeat=\"o in Ctrl.categoryOptions\" value=\"{{o.id}}\">\n" +
    "                                {{o.title}}\n" +
    "                            </md-option>\n" +
    "                        </md-select>\n" +
    "                    </md-input-container>\n" +
    "                    <md-input-container layout=\"row\" flex>\n" +
    "                        <label>Parent</label>\n" +
    "                        <md-select ng-model=\"Ctrl.item.parent_id\">\n" +
    "                            <md-option ng-repeat=\"o in Ctrl.parentOptions\" value=\"{{o.id}}\">\n" +
    "                                {{o.title}}\n" +
    "                            </md-option>\n" +
    "                        </md-select>\n" +
    "                    </md-input-container>\n" +
    "                    <md-input-container layout=\"row\" flex>\n" +
    "                        <md-checkbox class=\"md-primary\" ng-model=\"Ctrl.item.config.membersonly\">\n" +
    "                            Require Membership\n" +
    "                        </md-checkbox>\n" +
    "                    </md-input-container>\n" +
    "                    <md-input-container layout=\"row\" flex>\n" +
    "                        <label>Cart Limit</label>\n" +
    "                        <input ng-model=\"Ctrl.item.config.limit\"/>\n" +
    "                    </md-input-container>\n" +
    "                    <md-input-container layout=\"row\" flex>\n" +
    "                        <md-checkbox class=\"md-primary\" ng-model=\"Ctrl.item.config.taster\">\n" +
    "                            Enable Taster\n" +
    "                        </md-checkbox>\n" +
    "                    </md-input-container>\n" +
    "                    <md-input-container layout=\"row\" flex>\n" +
    "                        <label>Cart Display Options</label>\n" +
    "                        <md-select ng-model=\"Ctrl.item.config.display\">\n" +
    "                            <md-option ng-repeat=\"o in Ctrl.cartDisplayOptions\" value=\"{{o.value}}\">\n" +
    "                                {{o.text}}\n" +
    "                            </md-option>\n" +
    "                        </md-select>\n" +
    "                    </md-input-container>\n" +
    "                </div>\n" +
    "            </md-card>\n" +
    "            <md-card layout=\"column\" flex>\n" +
    "                <md-tabs md-dynamic-height>\n" +
    "                <md-tab label=\"Booking\">\n" +
    "                    <md-content layout-padding layout-column flex>\n" +
    "                        <md-input-container>\n" +
    "                            <label>Venue</label>\n" +
    "                            <md-select ng-model=\"Ctrl.item.venue_id\">\n" +
    "                                <md-option ng-repeat=\"o in Ctrl.venueOptions\" value=\"{{o.id}}\">\n" +
    "                                    {{o.title}}\n" +
    "                                </md-option>\n" +
    "                            </md-select>\n" +
    "                        </md-input-container>\n" +
    "                        <div ng-show=\"Ctrl.item.config.booking.enabled\">\n" +
    "\n" +
    "                        </div>\n" +
    "                        <md-input-container layout=\"row\" flex>\n" +
    "                            <md-checkbox class=\"md-primary\" ng-model=\"Ctrl.item.config.booking.enabled\">\n" +
    "                                Enable Booking\n" +
    "                            </md-checkbox>\n" +
    "                        </md-input-container>\n" +
    "                        <div ng-show=\"Ctrl.item.config.booking.enabled\">\n" +
    "                            <div>\n" +
    "                                <md-input-container layout=\"row\" flex>\n" +
    "                                    <label>Type</label>\n" +
    "                                    <md-select ng-model=\"Ctrl.item.config.booking.type\">\n" +
    "                                        <md-option ng-repeat=\"o in Ctrl.bookingTypeOptions\" value=\"{{o.value}}\">\n" +
    "                                            {{o.text}}\n" +
    "                                        </md-option>\n" +
    "                                    </md-select>\n" +
    "                                </md-input-container>\n" +
    "                            </div>\n" +
    "\n" +
    "                            <md-input-container layout=\"row\" flex>\n" +
    "                                <md-checkbox class=\"md-primary\" ng-model=\"Ctrl.item.config.booking.agegroups.enabled\">\n" +
    "                                    Enable Age Groups\n" +
    "                                </md-checkbox>\n" +
    "                            </md-input-container>\n" +
    "                            <div ng-show=\"Ctrl.item.config.booking.agegroups.enabled\">\n" +
    "                                <md-input-container layout=\"row\" flex>\n" +
    "                                    <label>Age Group</label>\n" +
    "                                    <md-select ng-model=\"Ctrl.item.config.booking.agegroups.agegroup\">\n" +
    "                                        <md-option ng-repeat=\"o in Ctrl.ageGroupOptions\" value=\"{{o.id}}\">\n" +
    "                                            {{o.text}}\n" +
    "                                        </md-option>\n" +
    "                                    </md-select>\n" +
    "                                </md-input-container>\n" +
    "                            </div>\n" +
    "                            <md-input-container layout=\"row\" flex>\n" +
    "                                <label>Capacity</label>\n" +
    "                                <input ng-model=\"Ctrl.item.config.booking.capacity\"/>\n" +
    "                            </md-input-container>\n" +
    "                        </div>\n" +
    "                        <fieldset>\n" +
    "                            <legend>Booking</legend>\n" +
    "\n" +
    "                        </fieldset>\n" +
    "                    </md-content>\n" +
    "                </md-tab>\n" +
    "                <md-tab label=\"Schedule\">\n" +
    "                    <md-content>\n" +
    "                        <md-input-container layout=\"row\" flex>\n" +
    "                                <md-checkbox class=\"md-primary\" ng-model=\"Ctrl.item.config.schedule.enabled\">\n" +
    "                                    Enable Scheduling\n" +
    "                                </md-checkbox>\n" +
    "                        </md-input-container>\n" +
    "                        <div ng-show=\"Ctrl.item.config.schedule.enabled\">\n" +
    "                                <md-input-container layout=\"row\" flex>\n" +
    "                                    <label>Type</label>\n" +
    "                                    <md-select ng-model=\"Ctrl.item.config.schedule.type\">\n" +
    "                                        <md-option ng-repeat=\"o in Ctrl.scheduleTypeOptions\" value=\"{{o.value}}\">\n" +
    "                                            {{o.text}}\n" +
    "                                        </md-option>\n" +
    "                                    </md-select>\n" +
    "                                </md-input-container>\n" +
    "                                <div ng-if=\"Ctrl.item.config.schedule.type == 'datespan' || Ctrl.item.config.schedule.type == 'recurring'\">\n" +
    "                                    <div class=\"well well-small\">\n" +
    "                                            <fieldset>\n" +
    "                                                <legend>Schedule</legend>\n" +
    "                                                <fieldset>\n" +
    "                                                    <div rg-range-picker=\"Ctrl.dateTimeRange\" labels=\"Ctrl.dateTimeLabels\"></div>\n" +
    "                                                </fieldset>\n" +
    "                                                <div ng-if=\"Ctrl.item.config.schedule.type == 'recurring'\">\n" +
    "                                                    <fieldset>\n" +
    "                                                        <legend>Recurrence</legend>\n" +
    "                                                        <rrule-recurring-select  rule=\"Ctrl.item.config.schedule.rrule\"></rrule-recurring-select>\n" +
    "                                                    </fieldset>\n" +
    "                                                </div>\n" +
    "                                            </fieldset>\n" +
    "                                            <fieldset>\n" +
    "                                                <legend>Exclude Dates</legend>\n" +
    "                                                <div class=\"col-md-6\">\n" +
    "                                                    <uib-datepicker ng-model='Ctrl.activeDate' multi-select='Ctrl.item.config.schedule.exdates' select-range='false'></uib-datepicker>\n" +
    "                                                </div>\n" +
    "                                                <div class=\"col-md-6\">\n" +
    "                                                    Excluded Dates:\n" +
    "                                                    <div style=\"overflow: auto;height: 100%;max-height: 210px;\">\n" +
    "                                                        <div ng-repeat='d in Ctrl.item.config.schedule.exdates | orderBy'>\n" +
    "                                                            {{d | date : 'fullDate'}}\n" +
    "                                                            <button class='btn btn-xs btn-warning' style='margin:5px' ng-click='Ctrl.removeExdate(d)'>Remove</button>\n" +
    "                                                        </div>\n" +
    "                                                    </div>\n" +
    "                                                </div>\n" +
    "                                            </fieldset>\n" +
    "\n" +
    "                                        </div>\n" +
    "                                </div>\n" +
    "                                <div ng-if=\"Ctrl.item.config.schedule.type == 'pickdates'\">\n" +
    "                                    <fieldset>\n" +
    "                                        <legend>Select Dates</legend>\n" +
    "                                        <div class=\"col-sm-6\">\n" +
    "                                            <uib-datepicker ng-model='Ctrl.activeDate' multi-select='Ctrl.item.config.schedule.dates' select-range='false'></uib-datepicker>\n" +
    "                                        </div>\n" +
    "                                        <div class=\"col-sm-6\">\n" +
    "                                            Selected Dates\n" +
    "                                            <div style=\"overflow: auto;height: 100%;max-height: 210px;\">\n" +
    "                                                <div ng-repeat='d in Ctrl.item.config.schedule.dates | orderBy'>\n" +
    "                                                    {{d | date : 'fullDate'}}\n" +
    "                                                    <button class='btn btn-xs btn-warning' style='margin:5px' ng-click='Ctrl.removeScheduledDate(d)'>Remove</button>\n" +
    "                                                </div>\n" +
    "                                            </div>\n" +
    "\n" +
    "                                        </div>\n" +
    "                                    </fieldset>\n" +
    "                                </div>\n" +
    "                        </div>\n" +
    "                    </md-content>\n" +
    "                </md-tab>\n" +
    "                <md-tab label=\"Payment\">\n" +
    "                    <div class=\"well well-large\">\n" +
    "                        <fieldset>\n" +
    "                            <legend>Payment</legend>\n" +
    "                            <div class=\"well well-lg\">\n" +
    "                                <fieldset>\n" +
    "                                    <legend>Paynow:</legend>\n" +
    "                                    <md-input-container layout=\"row\" flex>\n" +
    "                                        <md-checkbox class=\"md-primary\" ng-model=\"Ctrl.item.config.payment.paynow.enabled\">\n" +
    "                                            Enable\n" +
    "                                        </md-checkbox>\n" +
    "                                    </md-input-container>\n" +
    "                                    <div ng-show=\"Ctrl.item.config.payment.paynow.enabled\" class=\"form-group\">\n" +
    "                                        <md-input-container layout=\"row\" flex>\n" +
    "                                            <md-checkbox class=\"md-primary\" ng-model=\"Ctrl.item.config.payment.paynow.required\">\n" +
    "                                                Required\n" +
    "                                            </md-checkbox>\n" +
    "                                        </md-input-container>\n" +
    "                                        <div class='well well-large'>\n" +
    "                                            <fieldset>\n" +
    "                                                <legend>Methods</legend>\n" +
    "                                                <md-input-container layout=\"row\" flex>\n" +
    "                                                    <md-checkbox class=\"md-primary\" ng-model=\"Ctrl.item.config.payment.paynow.methods.paypal\">\n" +
    "                                                        Credit Card\n" +
    "                                                    </md-checkbox>\n" +
    "                                                </md-input-container>\n" +
    "                                                <md-input-container layout=\"row\" flex>\n" +
    "                                                    <md-checkbox class=\"md-primary\" ng-model=\"Ctrl.item.config.payment.paynow.ezcollect\">\n" +
    "                                                        Direct Debit\n" +
    "                                                    </md-checkbox>\n" +
    "                                                </md-input-container>\n" +
    "                                                <md-input-container layout=\"row\" flex>\n" +
    "                                                    <md-checkbox class=\"md-primary\" ng-model=\"Ctrl.item.config.payment.paynow.invoice\">\n" +
    "                                                        Invoice/Voucher\n" +
    "                                                    </md-checkbox>\n" +
    "                                                </md-input-container>\n" +
    "                                            </fieldset>\n" +
    "                                        </div>\n" +
    "                                    </div>\n" +
    "                                </fieldset>\n" +
    "                                <fieldset>\n" +
    "                                    <legend>Billing</legend>\n" +
    "                                    <md-input-container layout=\"row\" flex>\n" +
    "                                        <md-checkbox class=\"md-primary\" ng-model=\"Ctrl.item.config.payment.recurring.enabled\">\n" +
    "                                            Enable\n" +
    "                                        </md-checkbox>\n" +
    "                                    </md-input-container>\n" +
    "                                    <div ng-show=\"Ctrl.item.config.payment.recurring.enabled\" class=\"form-group\">\n" +
    "                                        <md-input-container layout=\"row\" flex>\n" +
    "                                            <md-checkbox class=\"md-primary\" ng-model=\"Ctrl.item.config.payment.recurring.required\">\n" +
    "                                                Required\n" +
    "                                            </md-checkbox>\n" +
    "                                        </md-input-container>\n" +
    "                                        <div class=\"well well-large\">\n" +
    "                                            <fieldset>\n" +
    "                                                <legend>Methods</legend>\n" +
    "                                                <md-input-container layout=\"row\" flex>\n" +
    "                                                    <md-checkbox class=\"md-primary\" ng-model=\"Ctrl.item.config.payment.recurring.methods.paypal\">\n" +
    "                                                        Credit Card\n" +
    "                                                    </md-checkbox>\n" +
    "                                                </md-input-container>\n" +
    "                                                <md-input-container layout=\"row\" flex>\n" +
    "                                                    <md-checkbox class=\"md-primary\" ng-model=\"Ctrl.item.config.payment.recurring.methods.directdebit\">\n" +
    "                                                        Direct Debit\n" +
    "                                                    </md-checkbox>\n" +
    "                                                </md-input-container>\n" +
    "                                                <md-input-container layout=\"row\" flex>\n" +
    "                                                    <md-checkbox class=\"md-primary\" ng-model=\"Ctrl.item.config.payment.recurring.methods.invoice\">\n" +
    "                                                        Invoice/Voucher\n" +
    "                                                    </md-checkbox>\n" +
    "                                                </md-input-container>\n" +
    "                                            </fieldset>\n" +
    "                                        </div>\n" +
    "                                    </div>\n" +
    "                                    <legend>Plans</legend>\n" +
    "                                    <md-input-container layout=\"row\" flex>\n" +
    "                                        <md-checkbox class=\"md-primary\" ng-model=\"Ctrl.item.config.payment.plans.enabled\">\n" +
    "                                            Enable\n" +
    "                                        </md-checkbox>\n" +
    "                                    </md-input-container>\n" +
    "                                    <div ng-show=\"Ctrl.item.config.payment.plans.enabled\" class=\"form-group\">\n" +
    "                                        <md-input-container layout=\"row\" flex>\n" +
    "                                            <md-checkbox class=\"md-primary\" ng-model=\"Ctrl.item.config.payment.plans.required\">\n" +
    "                                                Required\n" +
    "                                            </md-checkbox>\n" +
    "                                        </md-input-container>\n" +
    "                                        <div class=\"well well-large\">\n" +
    "                                            <fieldset>\n" +
    "                                                <legend>Plans</legend>\n" +
    "                                            </fieldset>\n" +
    "                                            <fieldset>\n" +
    "                                                <legend>Available Plans</legend>\n" +
    "                                                <h2>coming soon</h2>\n" +
    "                                            </fieldset>\n" +
    "                                        </div>\n" +
    "                                    </div>\n" +
    "                                </fieldset>\n" +
    "                            </div>\n" +
    "                        </fieldset>\n" +
    "                    </div>\n" +
    "                </md-tab>\n" +
    "                <md-tab label=\"Pricing\">\n" +
    "                    <md-content>\n" +
    "                        <div class=\"well well-lg\">\n" +
    "                            <h3>Pricing Options</h3>\n" +
    "                            <md-input-container md layout=\"row\" flex>\n" +
    "                                <label>Type</label>\n" +
    "                                <md-select ng-model=\"Ctrl.item.config.pricing.type\">\n" +
    "                                    <md-option ng-repeat=\"o in Ctrl.pricingTypeOptions\" value=\"{{o.value}}\">\n" +
    "                                        {{o.text}}\n" +
    "                                    </md-option>\n" +
    "                                </md-select>\n" +
    "                            </md-input-container>\n" +
    "                            <md-input-container layout=\"row\" flex>\n" +
    "                                <label>Unit Price</label>\n" +
    "                                <input ng-model=\"Ctrl.item.config.pricing.unit_price\"/>\n" +
    "                            </md-input-container>\n" +
    "\n" +
    "                        </div>\n" +
    "                    </md-content>\n" +
    "                </md-tab>\n" +
    "                <md-tab label=\"Discounts\">\n" +
    "                    <div class=\"well well-lg form-inline\">\n" +
    "                        <h3>Discount Options</h3>\n" +
    "                        <md-input-container layout=\"row\" flex>\n" +
    "                            <md-checkbox class=\"md-primary\" ng-model=\"Ctrl.item.config.discount.enabled\">\n" +
    "                                Enabled\n" +
    "                            </md-checkbox>\n" +
    "                        </md-input-container>\n" +
    "                        <div ng-show=\"Ctrl.item.config.discount.enabled\">\n" +
    "                            <label  class=\"control-label\">Sibling Enrollement</label>\n" +
    "                            <h2>Coming Soon</h2>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </md-tab>\n" +
    "                </md-tabs>\n" +
    "            </md-card>\n" +
    "    </md-content>\n" +
    "</div>\n" +
    "");
}]);

angular.module("products/items/products.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("products/items/products.tpl.html",
    "<md-content layout=\"column\" flex>\n" +
    "    <md-toolbar>\n" +
    "        <div class=\"md-toolbar-tools\">\n" +
    "            <md-button class=\"md-icon-button\" aria-label=\"Settings\">\n" +
    "                <md-icon md-svg-icon=\"img/icons/menu.svg\"></md-icon>\n" +
    "            </md-button>\n" +
    "            <h2>\n" +
    "                <span>Products</span>\n" +
    "            </h2>\n" +
    "            <span flex></span>\n" +
    "            <md-button class=\"md-icon-button\" aria-label=\"Favorite\">\n" +
    "                <md-icon md-svg-icon=\"img/icons/favorite.svg\"></md-icon>\n" +
    "            </md-button>\n" +
    "            <md-button aria-label=\"Create Product\" ui-sref=\"products.item\">\n" +
    "                <md-icon><i class=\"material-icons\">add_circle_outline</i></md-icon>\n" +
    "            </md-button>\n" +
    "        </div>\n" +
    "    </md-toolbar>\n" +
    "    <md-content flex>\n" +
    "        <div id=\"test\">\n" +
    "        </div>\n" +
    "        <h1 ng-if=\"!Ctrl.items.length\">No Products To Display</h1>\n" +
    "    </md-content>\n" +
    "\n" +
    "</md-content>");
}]);

angular.module("registrations/item/item.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("registrations/item/item.tpl.html",
    "<md-toolbar>\n" +
    "    <div class=\"md-toolbar-tools\">\n" +
    "        <h2>\n" +
    "            Registration: {{Ctrl.item.child.name}} at {{Ctrl.item.product.name}}\n" +
    "        </h2>\n" +
    "        <span flex></span>\n" +
    "    </div>\n" +
    "</md-toolbar>\n" +
    "<md-content>\n" +
    "    {{Ctrl.created}}\n" +
    "    {{Ctrl.createby}}\n" +
    "    {{Ctrl.state}}\n" +
    "    {{Ctrl.status}}\n" +
    "    <div flex>\n" +
    "        Order: {{Ctrl.item.order_id}}\n" +
    "    </div>\n" +
    "    <div flex>\n" +
    "        Child: {{Ctrl.item.child.name}}\n" +
    "    </div>\n" +
    "    <div flex>\n" +
    "        Product: {{Ctrl.item.product.title}}\n" +
    "    </div>\n" +
    "    <div flex>\n" +
    "        Start Date: {{Ctrl.item.date_start * 1000 | date:'dd/MM/yyyy'}}\n" +
    "    </div>\n" +
    "    <div flex>\n" +
    "        End Date: {{Ctrl.item.date_end * 1000 | date:'dd/MM/yyyy'}}\n" +
    "    </div>\n" +
    "</md-content>");
}]);

angular.module("registrations/items/items.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("registrations/items/items.tpl.html",
    "<md-sidenav class=\"md-sidenav-left md-whiteframe-z2\" md-component-id=\"left\" >\n" +
    "        <md-toolbar layout=\"row\">\n" +
    "            <div class=\"md-toolbar-tools\" ng-controller=\"LeftCtrl\" >\n" +
    "                <h1>Filters</h1>\n" +
    "                <span flex></span>\n" +
    "                <md-button ng-click=\"close()\" class=\"md-primary\" md-sidenav-focus>Close</md-button>\n" +
    "            </div>\n" +
    "\n" +
    "        </md-toolbar>\n" +
    "        <md-content>\n" +
    "            <md-input-container flex>\n" +
    "                <label>State</label>\n" +
    "                <md-select aria-label placeholder=\"state\" ng-model=\"Ctrl.filters.state\">\n" +
    "                    <md-option ng-repeat=\"state in [{text:'current',value:1},{text:'archive',value:0}]\" value=\"{{state.value}}\">\n" +
    "                        {{state.text}}\n" +
    "                    </md-option>\n" +
    "                </md-select>\n" +
    "            </md-input-container>\n" +
    "            <md-input-container flex>\n" +
    "                <label>Status</label>\n" +
    "                <md-select placeholder=\"Status\" ng-model=\"Ctrl.filters.status\">\n" +
    "                    <md-option ng-repeat=\"status in Ctrl.statusOptions\" value=\"{{status.value}}\">\n" +
    "                        {{status.text}}\n" +
    "                    </md-option>\n" +
    "                </md-select>\n" +
    "            </md-input-container>\n" +
    "        </md-content>\n" +
    "    </md-sidenav>\n" +
    "    <md-toolbar>\n" +
    "        <div class=\"md-toolbar-tools\">\n" +
    "            <md-button class=\"md-icon-button\" aria-label=\"Settings\">\n" +
    "                <md-icon md-svg-icon=\"img/icons/menu.svg\"></md-icon>\n" +
    "            </md-button>\n" +
    "            <h2>\n" +
    "                <span>Registrations</span>\n" +
    "            </h2>\n" +
    "            <span flex></span>\n" +
    "            <md-button ng-click=\"Ctrl.toggleLeft()\" ng-hide=\"Ctrl.isOpenLeft()\">\n" +
    "                Toggle Filters\n" +
    "            </md-button>\n" +
    "            <md-button aria-label=\"Create Product\" ui-sref=\"products.item\">\n" +
    "                <md-icon><i class=\"material-icons\">add_circle_outline</i></md-icon>\n" +
    "            </md-button>\n" +
    "        </div>\n" +
    "    </md-toolbar>\n" +
    "    <md-tooldbar>\n" +
    "        <div class=\"md-toolbar-tools\">Page: {{Ctrl.currentPage}}</div>\n" +
    "    </md-tooldbar>\n" +
    "    <md-content>\n" +
    "        <md-subheader class=\"md-1-line\">\n" +
    "            <div class=\"col-xs-12 col-sm-1 col-md-1\">\n" +
    "                ID\n" +
    "            </div>\n" +
    "            <div class=\"col-xs-12 col-sm-2 col-md-2\">\n" +
    "                Start Date\n" +
    "            </div>\n" +
    "            <div class=\"col-xs-12 col-sm-2 col-md-2\">\n" +
    "                End Date\n" +
    "            </div>\n" +
    "            <div class=\"col-xs-12 col-sm-3 col-md-3\">\n" +
    "                Child Name\n" +
    "            </div>\n" +
    "            <div class=\"col-xs-12 col-sm-4 col-md-4\">\n" +
    "                Product Name\n" +
    "            </div>\n" +
    "        </md-subheader>\n" +
    "\n" +
    "        <md-divider class=\"md-3-line\"></md-divider>\n" +
    "\n" +
    "        <md-list ng-if=\"Ctrl.items.length\">\n" +
    "            <md-list-item class=\"md-3-line\"\n" +
    "                          dir-paginate=\"item in Ctrl.items | itemsPerPage: Ctrl.pageSize\"\n" +
    "                          current-page=\"Ctrl.currentPage\"\n" +
    "                          pagination-id=\"registrations\"\n" +
    "                          total-items=\"Ctrl.total_items\">\n" +
    "                <div class=\"col-xs-12 col-sm-1 col-md-1\">\n" +
    "                    <a ui-sref=\"registrations.item({id:item.id})\" >\n" +
    "                        <i class=\"fa fa-edit\"></i> {{item.id}}\n" +
    "                    </a>\n" +
    "                </div>\n" +
    "                <div class=\"col-xs-12 col-sm-2 col-md-2\">\n" +
    "                    {{item.date_start * 1000 | date:'shortDate'}}\n" +
    "                </div>\n" +
    "                <div class=\"col-xs-12 col-sm-2 col-md-2\">\n" +
    "                    {{item.date_end * 1000 | date:'shortDate'}}\n" +
    "                </div>\n" +
    "                <div class=\"col-xs-12 col-sm-3 col-md-3\">\n" +
    "                    <a ui-sref=\"children.item({id:item.child_id})\" >\n" +
    "                        <i class=\"fa fa-edit\"></i> {{item.child_name}}\n" +
    "                    </a>\n" +
    "                </div>\n" +
    "                <div class=\"col-xs-12 col-sm-4 col-md-4\">\n" +
    "                    <a ui-sref=\"products.item({id:item.product_id})\" >\n" +
    "                        <i class=\"fa fa-edit\"></i> {{item.product_name}}\n" +
    "                    </a>\n" +
    "                </div>\n" +
    "                <md-divider ng-if=\"!$last\"></md-divider>\n" +
    "            </md-list-item>\n" +
    "        </md-list>\n" +
    "        <dir-pagination-controls ng-if=\"Ctrl.items.length\"\n" +
    "                direction-links=\"true\"\n" +
    "                boundary-links=\"true\"\n" +
    "                auto-hide=\"true\"\n" +
    "                pagination-id=\"registrations\"\n" +
    "                ></dir-pagination-controls>\n" +
    "        <h1 ng-if=\"!Ctrl.items.length\">No Registrations To Display</h1>\n" +
    "    </md-content>\n" +
    "\n" +
    "\n" +
    "");
}]);

angular.module("reports/reports.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("reports/reports.tpl.html",
    "<div class=\"jumbotron\">\n" +
    "  <h1>Non-Trivial AngularJS Made Easy</h1>\n" +
    "\n" +
    "  <p class=\"lead\">\n" +
    "    Everything you need to kickstart AngularJS projects: a best-practice\n" +
    "    directory structure, an intelligent build system, and the best web design\n" +
    "    libraries around.\n" +
    "  </p>\n" +
    "\n" +
    "  <ul class=\"list-inline social-buttons\">\n" +
    "    <li>\n" +
    "      <iframe \n" +
    "        src=\"http://ghbtns.com/github-btn.html?user=ngbp&amp;repo=ngbp&amp;type=watch&amp;count=true\" \n" +
    "        allowtransparency=\"true\" \n" +
    "        frameborder=\"0\" \n" +
    "        scrolling=\"0\" \n" +
    "        width=\"110\" \n" +
    "        height=\"20\">\n" +
    "      </iframe>\n" +
    "    </li>\n" +
    "    <li>\n" +
    "      <iframe \n" +
    "        src=\"http://ghbtns.com/github-btn.html?user=ngbp&amp;repo=ngbp&amp;type=fork&amp;count=true\" \n" +
    "        allowtransparency=\"true\" \n" +
    "        frameborder=\"0\" \n" +
    "        scrolling=\"0\" \n" +
    "        width=\"95\" \n" +
    "        height=\"20\">\n" +
    "      </iframe>\n" +
    "    </li>\n" +
    "    <li>\n" +
    "       <iframe allowtransparency=\"true\" frameborder=\"0\" scrolling=\"no\"\n" +
    "        src=\"https://platform.twitter.com/widgets/tweet_button.html?url=http%3A%2F%2Fbit.ly%2FngBoilerplate&counturl=http%3A%2F%2Fngbp.github.com%2Fngbp&text=Check%20out%20%23ngbp%20-%20an%20awesome%20kickstarter%20for%20web%20projects%20%7C&hashtags=angularjs&via=joshdmiller&related=joshdmiller\"\n" +
    "        style=\"width:130px; height:20px;\"></iframe>\n" +
    "    </li>\n" +
    "    <li plus-one></li>\n" +
    "  </ul> \n" +
    "  \n" +
    "  <div class=\"btn-group\">\n" +
    "    <a href=\"https://github.com/ngbp/ngbp#readme\" class=\"btn btn-large btn-default\">\n" +
    "      <i class=\"fa fa-book\"></i>\n" +
    "      Read the Docs\n" +
    "    </a>\n" +
    "    <a href=\"https://github.com/ngbp/ngbp\" class=\"btn btn-large btn-success\">\n" +
    "      <i class=\"fa fa-download\"></i>\n" +
    "      Download\n" +
    "    </a>\n" +
    "  </div>\n" +
    "\n" +
    "</div>\n" +
    "\n" +
    "<div class=\"marketing\">\n" +
    "  <div class=\"row\">\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-thumbs-up\"></i> Good to Go!</h4>\n" +
    "      <p>\n" +
    "        Kickstarts your project quickly, with everything you need, so you can \n" +
    "        focus on what matters: your app.\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-magic\"></i> Complete Build System</h4>\n" +
    "      <p>\n" +
    "        A smart, <a href=\"http://gruntjs.com\">Grunt</a>-based build system \n" +
    "        designed to save you time and energy.\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-retweet\"></i> Modularization</h4>\n" +
    "      <p>\n" +
    "        Supports a structure that maintains separation of concerns while\n" +
    "        ensuring maximum code reuse.\n" +
    "      </p>\n" +
    "    </div>\n" +
    "  </div>\n" +
    "  <div class=\"row\">\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-star\"></i> AngularJS</h4>\n" +
    "      <p>\n" +
    "        JavaScript framework that augments browser-based, single-page \n" +
    "        applications with MVC functionality.\n" +
    "        <a href=\"http://angularjs.org\">More &raquo;</a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-resize-small\"></i> LESS CSS</h4>\n" +
    "      <p>\n" +
    "        The dynamic stylesheet language that extends CSS with efficiency.\n" +
    "        <a href=\"http://lesscss.org\">More &raquo;</a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-twitter\"></i> Twitter Bootstrap</h4>\n" +
    "      <p>\n" +
    "        Sleek, intuitive, and powerful front-end framework for faster and easier\n" +
    "        web development.\n" +
    "        <a href=\"http://getbootstrap.com\">More &raquo;</a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "  </div>\n" +
    "  <div class=\"row\">\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-circle\"></i> Angular UI Bootstrap</h4>\n" +
    "      <p>\n" +
    "        Pure AngularJS components for Bootstrap written by the \n" +
    "        <a href=\"https://github.com/angular-ui?tab=members\">AngularUI Team</a>.\n" +
    "        <a href=\"http://angular-ui.github.com/bootstrap\">More &raquo;</a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-flag\"></i> Font Awesome</h4>\n" +
    "      <p>\n" +
    "        The iconic font designed for use with Twitter Bootstrap.\n" +
    "        <a href=\"http://fortawesome.github.com/Font-Awesome\">\n" +
    "          More &raquo;\n" +
    "        </a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-asterisk\"></i> Placeholders</h4>\n" +
    "      <p>\n" +
    "        Client-side image and text placeholder directives written in pure \n" +
    "        AngularJS to make designing mock-ups wicked-fast.\n" +
    "        <a href=\"http://joshdmiller.github.com/angular-placeholders\">\n" +
    "          More &raquo;\n" +
    "        </a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "  </div>\n" +
    "</div>\n" +
    "\n" +
    "");
}]);

angular.module("rollcall/products/products.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("rollcall/products/products.tpl.html",
    "<md-content layout=\"column\" flex>\n" +
    "    <md-toolbar>\n" +
    "        <div class=\"md-toolbar-tools\">\n" +
    "            <md-button class=\"md-icon-button\" aria-label=\"Settings\">\n" +
    "                <md-icon md-svg-icon=\"img/icons/menu.svg\"></md-icon>\n" +
    "            </md-button>\n" +
    "            <h2>\n" +
    "                <span>Products</span>\n" +
    "            </h2>\n" +
    "            <span flex></span>\n" +
    "            <md-button class=\"md-icon-button\" aria-label=\"Favorite\">\n" +
    "                <md-icon md-svg-icon=\"img/icons/favorite.svg\"></md-icon>\n" +
    "            </md-button>\n" +
    "            <md-button aria-label=\"Create Product\" ui-sref=\"products.item\">\n" +
    "                <md-icon><i class=\"material-icons\">add_circle_outline</i></md-icon>\n" +
    "            </md-button>\n" +
    "        </div>\n" +
    "    </md-toolbar>\n" +
    "    <md-content flex>\n" +
    "        <div id=\"test\">\n" +
    "        </div>\n" +
    "        <h1 ng-if=\"!Ctrl.items.length\">No Products To Display</h1>\n" +
    "    </md-content>\n" +
    "\n" +
    "</md-content>");
}]);

angular.module("rollcall/rollcall.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("rollcall/rollcall.tpl.html",
    "<div class=\"jumbotron\">\n" +
    "  <h1>Non-Trivial AngularJS Made Easy</h1>\n" +
    "\n" +
    "  <p class=\"lead\">\n" +
    "    Everything you need to kickstart AngularJS projects: a best-practice\n" +
    "    directory structure, an intelligent build system, and the best web design\n" +
    "    libraries around.\n" +
    "  </p>\n" +
    "\n" +
    "  <ul class=\"list-inline social-buttons\">\n" +
    "    <li>\n" +
    "      <iframe \n" +
    "        src=\"http://ghbtns.com/github-btn.html?user=ngbp&amp;repo=ngbp&amp;type=watch&amp;count=true\" \n" +
    "        allowtransparency=\"true\" \n" +
    "        frameborder=\"0\" \n" +
    "        scrolling=\"0\" \n" +
    "        width=\"110\" \n" +
    "        height=\"20\">\n" +
    "      </iframe>\n" +
    "    </li>\n" +
    "    <li>\n" +
    "      <iframe \n" +
    "        src=\"http://ghbtns.com/github-btn.html?user=ngbp&amp;repo=ngbp&amp;type=fork&amp;count=true\" \n" +
    "        allowtransparency=\"true\" \n" +
    "        frameborder=\"0\" \n" +
    "        scrolling=\"0\" \n" +
    "        width=\"95\" \n" +
    "        height=\"20\">\n" +
    "      </iframe>\n" +
    "    </li>\n" +
    "    <li>\n" +
    "       <iframe allowtransparency=\"true\" frameborder=\"0\" scrolling=\"no\"\n" +
    "        src=\"https://platform.twitter.com/widgets/tweet_button.html?url=http%3A%2F%2Fbit.ly%2FngBoilerplate&counturl=http%3A%2F%2Fngbp.github.com%2Fngbp&text=Check%20out%20%23ngbp%20-%20an%20awesome%20kickstarter%20for%20web%20projects%20%7C&hashtags=angularjs&via=joshdmiller&related=joshdmiller\"\n" +
    "        style=\"width:130px; height:20px;\"></iframe>\n" +
    "    </li>\n" +
    "    <li plus-one></li>\n" +
    "  </ul> \n" +
    "  \n" +
    "  <div class=\"btn-group\">\n" +
    "    <a href=\"https://github.com/ngbp/ngbp#readme\" class=\"btn btn-large btn-default\">\n" +
    "      <i class=\"fa fa-book\"></i>\n" +
    "      Read the Docs\n" +
    "    </a>\n" +
    "    <a href=\"https://github.com/ngbp/ngbp\" class=\"btn btn-large btn-success\">\n" +
    "      <i class=\"fa fa-download\"></i>\n" +
    "      Download\n" +
    "    </a>\n" +
    "  </div>\n" +
    "\n" +
    "</div>\n" +
    "\n" +
    "<div class=\"marketing\">\n" +
    "  <div class=\"row\">\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-thumbs-up\"></i> Good to Go!</h4>\n" +
    "      <p>\n" +
    "        Kickstarts your project quickly, with everything you need, so you can \n" +
    "        focus on what matters: your app.\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-magic\"></i> Complete Build System</h4>\n" +
    "      <p>\n" +
    "        A smart, <a href=\"http://gruntjs.com\">Grunt</a>-based build system \n" +
    "        designed to save you time and energy.\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-retweet\"></i> Modularization</h4>\n" +
    "      <p>\n" +
    "        Supports a structure that maintains separation of concerns while\n" +
    "        ensuring maximum code reuse.\n" +
    "      </p>\n" +
    "    </div>\n" +
    "  </div>\n" +
    "  <div class=\"row\">\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-star\"></i> AngularJS</h4>\n" +
    "      <p>\n" +
    "        JavaScript framework that augments browser-based, single-page \n" +
    "        applications with MVC functionality.\n" +
    "        <a href=\"http://angularjs.org\">More &raquo;</a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-resize-small\"></i> LESS CSS</h4>\n" +
    "      <p>\n" +
    "        The dynamic stylesheet language that extends CSS with efficiency.\n" +
    "        <a href=\"http://lesscss.org\">More &raquo;</a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-twitter\"></i> Twitter Bootstrap</h4>\n" +
    "      <p>\n" +
    "        Sleek, intuitive, and powerful front-end framework for faster and easier\n" +
    "        web development.\n" +
    "        <a href=\"http://getbootstrap.com\">More &raquo;</a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "  </div>\n" +
    "  <div class=\"row\">\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-circle\"></i> Angular UI Bootstrap</h4>\n" +
    "      <p>\n" +
    "        Pure AngularJS components for Bootstrap written by the \n" +
    "        <a href=\"https://github.com/angular-ui?tab=members\">AngularUI Team</a>.\n" +
    "        <a href=\"http://angular-ui.github.com/bootstrap\">More &raquo;</a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-flag\"></i> Font Awesome</h4>\n" +
    "      <p>\n" +
    "        The iconic font designed for use with Twitter Bootstrap.\n" +
    "        <a href=\"http://fortawesome.github.com/Font-Awesome\">\n" +
    "          More &raquo;\n" +
    "        </a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-asterisk\"></i> Placeholders</h4>\n" +
    "      <p>\n" +
    "        Client-side image and text placeholder directives written in pure \n" +
    "        AngularJS to make designing mock-ups wicked-fast.\n" +
    "        <a href=\"http://joshdmiller.github.com/angular-placeholders\">\n" +
    "          More &raquo;\n" +
    "        </a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "  </div>\n" +
    "</div>\n" +
    "\n" +
    "");
}]);

angular.module("rollcall/roster/roster.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("rollcall/roster/roster.tpl.html",
    "test");
}]);

angular.module("subscriptions/item/item.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("subscriptions/item/item.tpl.html",
    "<div>\n" +
    "    <md-toolbar>\n" +
    "        <div class=\"md-toolbar-tools\">\n" +
    "            <md-button class=\"md-icon-button\" aria-label=\"Settings\">\n" +
    "                <md-icon md-svg-icon=\"img/icons/menu.svg\"></md-icon>\n" +
    "            </md-button>\n" +
    "            <h2>\n" +
    "                <div class=\"form-horizontal\">\n" +
    "                    Product Name:\n" +
    "                    <a href=\"#\" editable-text=\"Ctrl.item.title\">\n" +
    "                        {{ Ctrl.item.title || '_____' }}\n" +
    "                    </a>\n" +
    "                </div>\n" +
    "            </h2>\n" +
    "            <span flex></span>\n" +
    "            <md-button\n" +
    "                    tooltip=\"Manage Events For This Product\"\n" +
    "                    tooltip-placement=\"left\"\n" +
    "                    class=\"md-icon-button\"\n" +
    "                    aria-label=\"Favorite\"\n" +
    "                    ui-sref=\"events({productId:Ctrl.item.id})\">\n" +
    "                <md-icon>\n" +
    "                    <i class=\"material-icons\">event_note</i>\n" +
    "                </md-icon>\n" +
    "            </md-button>\n" +
    "            <md-button tooltip=\"Save Current Item State\"\n" +
    "                       tooltip-placement=\"left\"\n" +
    "                       class=\"md-icon-button\"\n" +
    "                       aria-label=\"Save\"\n" +
    "                       ng-click=\"Ctrl.saveItem()\">\n" +
    "                <md-icon><i class=\"material-icons\">check</i></md-icon>\n" +
    "            </md-button>\n" +
    "            <div class=\"test\">\n" +
    "                <md-button class=\"md-icon-button md-warn\"\n" +
    "                           tooltip=\"Delete Current Item\"\n" +
    "                           tooltip-placement=\"left\"\n" +
    "                           aria-label=\"More\"\n" +
    "                           ng-click=\"Ctrl.deleteItem()\">\n" +
    "                    <md-icon> <i class=\"material-icons\">delete</i> </md-icon>\n" +
    "                </md-button>\n" +
    "            </div>\n" +
    "\n" +
    "        </div>\n" +
    "    </md-toolbar>\n" +
    "    <md-content>\n" +
    "            <div class=\"well\">\n" +
    "                <div class=\"form-group\">\n" +
    "                    <label class=\"col-md-4 control-label\">Description:</label>\n" +
    "                    <a  class=\"input-md\" href=\"#\" editable-textarea=\"Ctrl.item.description\" e-rows=\"7\" e-cols=\"60\">\n" +
    "                        {{ Ctrl.item.description || '_____' }}\n" +
    "                    </a>\n" +
    "                </div>\n" +
    "                <div class=\"form-group\">\n" +
    "                    <label class=\"col-md-4 control-label\">Product Category:</label>\n" +
    "                    <a href=\"#\" editable-select=\"Ctrl.item.category_id\" e-ng-options=\"o.id as o.title for o in Ctrl.categoryOptions\">\n" +
    "                        {{ Ctrl.showCategory() || '_____' }}\n" +
    "                    </a>\n" +
    "                </div>\n" +
    "                <div class=\"form-group\">\n" +
    "                    <label class=\"col-md-4 control-label\">Parent Product:</label>\n" +
    "                    <a href=\"#\" editable-select=\"Ctrl.item.parent_id\" e-ng-options=\"o.id as o.title for o in Ctrl.parentOptions\">\n" +
    "                        {{ Ctrl.showParent() || '_____' }}\n" +
    "                    </a>\n" +
    "                </div>\n" +
    "                <div class=\"form-group\">\n" +
    "                    <label class=\"col-md-4 control-label\">Require Membership:</label>\n" +
    "                    <input type=\"checkbox\" ng-model=\"Ctrl.item.config.membersonly\"/>\n" +
    "                </div>\n" +
    "                <div class=\"form-group\">\n" +
    "                    <label class=\"col-md-4 control-label\">Cart Limit:</label>\n" +
    "                    <a href=\"#\" editable-text=\"Ctrl.item.config.limit\">\n" +
    "                        {{ Ctrl.item.config.limit || '0' }}\n" +
    "                    </a>\n" +
    "                </div>\n" +
    "                <div class=\"form-group\">\n" +
    "                    <label for=\"taster_enable\" class=\"col-md-4 control-label\">Enable Taster:</label>\n" +
    "                    <input id=\"taster_enable\" type=\"checkbox\" ng-model=\"Ctrl.item.config.taster\"/>\n" +
    "                </div>\n" +
    "                <div class=\"form-group\">\n" +
    "                    <label class=\"col-md-4 control-label\">Cart Display Options:</label>\n" +
    "                    <a href=\"#\"\n" +
    "                       editable-select=\"Ctrl.item.config.display\"\n" +
    "                       e-ng-options=\"o.value as o.text for o in Ctrl.cartDisplayOptions\">\n" +
    "                        {{ Ctrl.showCartDisplayType() || '_____' }}\n" +
    "                    </a>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "\n" +
    "            <uib-tabset >\n" +
    "                <uib-tab heading=\"Booking\">\n" +
    "                    <div class=\"well\">\n" +
    "                        <fieldset>\n" +
    "                            <legend>Booking</legend>\n" +
    "                            <div class=\"form-group\">\n" +
    "                                <label class=\"col-md-4 control-label\">Enable Booking</label>\n" +
    "                                <input type=\"checkbox\" ng-model=\"Ctrl.item.config.booking.enabled\"/>\n" +
    "                            </div>\n" +
    "                            <div ng-show=\"Ctrl.item.config.booking.enabled\" class=\"fade-in\">\n" +
    "                                <div class=\"form-group\">\n" +
    "                                    <label class=\"col-md-4 control-label\">Select Venue</label>\n" +
    "                                    <a href=\"#\"\n" +
    "                                       editable-select=\"Ctrl.item.config.booking.venue_id\"\n" +
    "                                       e-ng-options=\"o.id as o.title for o in Ctrl.venueOptions\">\n" +
    "                                        {{ Ctrl.showVenue() || '_____' }}\n" +
    "                                    </a>\n" +
    "                                </div>\n" +
    "                                <div class=\"form-group\">\n" +
    "                                    <label class=\"col-md-4 control-label\">Booking Type:</label>\n" +
    "                                    <a href=\"#\"\n" +
    "                                       editable-select=\"Ctrl.item.config.booking.type\"\n" +
    "                                       e-ng-options=\"o.value as o.text for o in Ctrl.bookingTypeOptions\">\n" +
    "                                        {{ Ctrl.showBookingType() || '_____' }}\n" +
    "                                    </a>\n" +
    "                                </div>\n" +
    "                                <div class=\"form-group\">\n" +
    "                                    <label class=\"col-md-4 control-label\">Enable Age Groups</label>\n" +
    "                                    <input type=\"checkbox\" ng-model=\"Ctrl.item.config.booking.agegroups.enabled\">\n" +
    "                                </div>\n" +
    "                                <div ng-show=\"Ctrl.item.config.booking.agegroups.enabled\">\n" +
    "                                    <div class=\"form-group\">\n" +
    "                                        <label class=\"col-md-4 control-label\">Age Group:</label>\n" +
    "                                        <a href=\"#\"\n" +
    "                                           editable-select=\"Ctrl.item.config.booking.agegroups.agegroup\"\n" +
    "                                           e-ng-options=\"o.id as o.title for o in Ctrl.ageGroupOptions\">\n" +
    "                                            {{ Ctrl.showAgeGroup() || '_____' }}\n" +
    "                                        </a>\n" +
    "                                    </div>\n" +
    "                                </div>\n" +
    "                                <div class=\"form-group\">\n" +
    "                                    <label class=\"col-md-4 control-label\">Capacity:</label>\n" +
    "                                    <a href=\"#\" editable-text=\"Ctrl.item.config.booking.capacity\">\n" +
    "                                        {{ Ctrl.item.config.booking.capacity || '_____' }}\n" +
    "                                    </a>\n" +
    "                                </div>\n" +
    "\n" +
    "                            </div>\n" +
    "                        </fieldset>\n" +
    "\n" +
    "                    </div>\n" +
    "                </uib-tab>\n" +
    "                <uib-tab heading=\"Schedule\">\n" +
    "                    <div class=\"well well-large\">\n" +
    "                        <lable>Enable Scheduling</lable>\n" +
    "                        <input type=\"checkbox\", ng-model=\"Ctrl.item.config.schedule.enabled\"/>\n" +
    "                        <div ng-show=\"Ctrl.item.config.schedule.enabled\">\n" +
    "                            <div class=\"form-group\">\n" +
    "                                <label class=\"col-md-4 control-label\">Schedule Type</label>\n" +
    "                                <a href=\"#\" editable-select=\"Ctrl.item.config.schedule.type\" e-ng-options=\"o.value as o.text for o in Ctrl.scheduleTypeOptions\">\n" +
    "                                    {{ Ctrl.showScheduleType() || '_____' }}\n" +
    "                                </a>\n" +
    "                            </div>\n" +
    "                            <div>\n" +
    "                            <div ng-if=\"Ctrl.item.config.schedule.type == 'datespan' || Ctrl.item.config.schedule.type == 'recurring'\">\n" +
    "                                <div class=\"well well-small\">\n" +
    "                                    <fieldset>\n" +
    "                                        <legend>Schedule</legend>\n" +
    "                                        <fieldset>\n" +
    "                                            <div rg-range-picker=\"Ctrl.dateTimeRange\" labels=\"Ctrl.dateTimeLabels\"></div>\n" +
    "                                        </fieldset>\n" +
    "                                        <div ng-if=\"Ctrl.item.config.schedule.type == 'recurring'\">\n" +
    "                                            <fieldset>\n" +
    "                                                <legend>Recurrence</legend>\n" +
    "                                                <rrule-recurring-select  rule=\"Ctrl.item.config.schedule.rrule\"></rrule-recurring-select>\n" +
    "                                            </fieldset>\n" +
    "                                        </div>\n" +
    "                                    </fieldset>\n" +
    "                                    <fieldset>\n" +
    "                                        <legend>Exclude Dates</legend>\n" +
    "                                        <div class=\"col-md-6\">\n" +
    "                                            <uib-datepicker ng-model='Ctrl.activeDate' multi-select='Ctrl.item.config.schedule.exdates' select-range='false'></uib-datepicker>\n" +
    "                                        </div>\n" +
    "                                        <div class=\"col-md-6\">\n" +
    "                                            Excluded Dates:\n" +
    "                                            <div style=\"overflow: auto;height: 100%;max-height: 210px;\">\n" +
    "                                                <div ng-repeat='d in Ctrl.item.config.schedule.exdates | orderBy'>\n" +
    "                                                    {{d | date : 'fullDate'}}\n" +
    "                                                    <button class='btn btn-xs btn-warning' style='margin:5px' ng-click='Ctrl.removeExdate(d)'>Remove</button>\n" +
    "                                                </div>\n" +
    "                                            </div>\n" +
    "                                        </div>\n" +
    "                                    </fieldset>\n" +
    "\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                                <div ng-if=\"Ctrl.item.config.schedule.type == 'pickdates'\">\n" +
    "                                    <fieldset>\n" +
    "                                        <legend>Select Dates</legend>\n" +
    "                                        <div class=\"col-sm-6\">\n" +
    "                                            <uib-datepicker ng-model='Ctrl.activeDate' multi-select='Ctrl.item.config.schedule.dates' select-range='false'></uib-datepicker>\n" +
    "                                        </div>\n" +
    "                                        <div class=\"col-sm-6\">\n" +
    "                                            Selected Dates\n" +
    "                                            <div style=\"overflow: auto;height: 100%;max-height: 210px;\">\n" +
    "                                                <div ng-repeat='d in Ctrl.item.config.schedule.dates | orderBy'>\n" +
    "                                                    {{d | date : 'fullDate'}}\n" +
    "                                                    <button class='btn btn-xs btn-warning' style='margin:5px' ng-click='Ctrl.removeScheduledDate(d)'>Remove</button>\n" +
    "                                                </div>\n" +
    "                                            </div>\n" +
    "\n" +
    "                                        </div>\n" +
    "                                    </fieldset>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </uib-tab>\n" +
    "                <uib-tab heading=\"Payment\">\n" +
    "                    <div class=\"well well-large\">\n" +
    "                        <fieldset>\n" +
    "                            <legend>Payment</legend>\n" +
    "                            <div class=\"well well-lg\">\n" +
    "                                <fieldset>\n" +
    "                                    <legend>Paynow:</legend>\n" +
    "                                    <div class=\"form-group\">\n" +
    "                                        <label class=\"col-md-4 control-label\">Enable Paynow:</label>\n" +
    "                                        <input type=\"checkbox\" ng-model=\"Ctrl.item.config.payment.paynow.enabled\"/>\n" +
    "                                    </div>\n" +
    "                                    <div ng-show=\"Ctrl.item.config.payment.paynow.enabled\" class=\"form-group\">\n" +
    "                                        <label class=\"col-md-4 control-label\">Require Prepay:</label>\n" +
    "                                        <input type=\"checkbox\" ng-model=\"Ctrl.item.config.payment.paynow.required\"/>\n" +
    "                                    </div>\n" +
    "                                    <div class='well well-large' ng-show=\"Ctrl.item.config.payment.paynow.enabled\">\n" +
    "                                        <fieldset>\n" +
    "                                            <legend>Methods</legend>\n" +
    "                                            <div class=\"form-group\">\n" +
    "                                                <label class=\"col-md-4 control-label\">Credit Card:</label>\n" +
    "                                                <input type=\"checkbox\" ng-model=\"Ctrl.item.config.payment.paynow.methods.paypal\"/>\n" +
    "                                            </div>\n" +
    "                                            <div class=\"form-group\">\n" +
    "                                                <label class=\"col-md-4 control-label\">Direct Debit:</label>\n" +
    "                                                <input type=\"checkbox\" ng-model=\"Ctrl.item.config.payment.paynow.ezcollect\"/>\n" +
    "                                            </div>\n" +
    "                                            <div class=\"form-group\">\n" +
    "                                                <label class=\"col-md-4 control-label\">Invoice/Voucher:</label>\n" +
    "                                                <input type=\"checkbox\" ng-model=\"Ctrl.item.config.payment.paynow.invoice\"/>\n" +
    "                                            </div>\n" +
    "                                        </fieldset>\n" +
    "                                    </div>\n" +
    "                                </fieldset>\n" +
    "                                <fieldset>\n" +
    "                                    <legend>Billing</legend>\n" +
    "                                    <div class=\"form-group\">\n" +
    "                                        <label class=\"col-md-4 control-label\">Enable Billing:</label>\n" +
    "                                        <input type=\"checkbox\" ng-model=\"Ctrl.item.config.payment.recurring.enabled\"/>\n" +
    "                                    </div>\n" +
    "                                    <div ng-show=\"Ctrl.item.config.payment.recurring.enabled\" class=\"form-group\">\n" +
    "                                        <label class=\"col-md-4 control-label\">Required</label>\n" +
    "                                        <input type=\"checkbox\" ng-model=\"Ctrl.item.config.payment.recurring.required\"/>\n" +
    "                                    </div>\n" +
    "                                    <div ng-show=\"Ctrl.item.config.payment.recurring.enabled\" class=\"well well-large\">\n" +
    "                                        <fieldset>\n" +
    "                                            <legend>Methods</legend>\n" +
    "                                            <div class=\"form-group\">\n" +
    "                                                <label class=\"col-md-4 control-label\">Credit Card:</label>\n" +
    "                                                <input type=\"checkbox\" ng-model=\"Ctrl.item.config.payment.recurring.methods.paypal\"/>\n" +
    "                                            </div>\n" +
    "                                            <div class=\"form-group\">\n" +
    "                                                <label class=\"col-md-4 control-label\">Direct Debit:</label>\n" +
    "                                                <input type=\"checkbox\" ng-model=\"Ctrl.item.config.payment.recurring.methods.directdebit\"/>\n" +
    "                                            </div>\n" +
    "                                            <div class=\"form-group\">\n" +
    "                                                <label class=\"col-md-4 control-label\">Invoice/Voucher:</label>\n" +
    "                                                <input type=\"checkbox\" ng-model=\"Ctrl.item.config.payment.recurring.methods.invoice\"/>\n" +
    "                                            </div>\n" +
    "                                        </fieldset>\n" +
    "                                    </div>\n" +
    "                                    <legend>Plans</legend>\n" +
    "                                    <div class=\"form-group\">\n" +
    "                                        <label class=\"col-md-4 control-label\">Enable Plans:</label>\n" +
    "                                        <input type=\"checkbox\" ng-model=\"Ctrl.item.config.payment.plans.enabled\"/>\n" +
    "                                    </div>\n" +
    "                                    <div ng-show=\"Ctrl.item.config.payment.plans.enabled\" class=\"form-group\">\n" +
    "                                        <label class=\"col-md-4 control-label\">Required</label>\n" +
    "                                        <input type=\"checkbox\" ng-model=\"Ctrl.item.config.payment.plans.required\"/>\n" +
    "                                    </div>\n" +
    "                                    <div ng-show=\"Ctrl.item.config.payment.plans.enabled\" class=\"well well-large\">\n" +
    "                                        <fieldset>\n" +
    "                                            <legend>Plans</legend>\n" +
    "                                            <h2>coming soon</h2>\n" +
    "                                        </fieldset>\n" +
    "                                        <fieldset>\n" +
    "                                            <legend>Plans</legend>\n" +
    "                                            <div class=\"form-group\">\n" +
    "                                                <label class=\"col-md-4 control-label\">Period:</label>\n" +
    "                                                <a href=\"#\" editable-select=\"Ctrl.item.config.payment.plans\" e-ng-options=\"o.value as o.text for o in Ctrl.scheduleTypeOptions\">\n" +
    "                                                    {{ Ctrl.showScheduleType() || '_____' }}\n" +
    "                                                </a>\n" +
    "                                            </div>\n" +
    "                                        </fieldset>\n" +
    "                                    </div>\n" +
    "                                </fieldset>\n" +
    "                            </div>\n" +
    "                        </fieldset>\n" +
    "                    </div>\n" +
    "                </uib-tab>\n" +
    "                <uib-tab heading=\"Pricing\">\n" +
    "                    <div class=\"well well-lg\">\n" +
    "                        <h3>Pricing Options</h3>\n" +
    "                        <div class=\"form-group\">\n" +
    "                            <label class=\"col-md-4 control-label\">Type:</label>\n" +
    "                            <a href=\"#\" editable-select=\"Ctrl.item.config.pricing.type\" e-ng-options=\"o.value as o.text for o in Ctrl.pricingTypeOptions\">\n" +
    "                                {{ Ctrl.showPricingType() || 'not set' }}\n" +
    "                            </a>\n" +
    "                        </div>\n" +
    "                        <div class=\"form-group\">\n" +
    "                            <label class=\"col-md-4 control-label\">Unit Price:</label>\n" +
    "                            <a href=\"#\" editable-text=\"Ctrl.item.config.pricing.unit_price\">\n" +
    "                                {{ Ctrl.item.config.pricing.unit_price || 'not set' }}\n" +
    "                            </a>\n" +
    "                        </div>\n" +
    "\n" +
    "                    </div>\n" +
    "                </uib-tab>\n" +
    "                <uib-tab heading=\"Discounts\">\n" +
    "                    <div class=\"well well-lg form-inline\">\n" +
    "                        <h3>Discount Options</h3>\n" +
    "                        <label class=\"control-label\">Enable Discounts</label>\n" +
    "                        <input type=\"checkbox\" ng-model=\"Ctrl.item.config.discount.enabled\" class=\"form-control\"/>\n" +
    "                        <div ng-show=\"Ctrl.item.config.discount.enabled\">\n" +
    "                            <label  class=\"control-label\">Sibling Enrollement</label>\n" +
    "                            <input type=\"checkbox\" ng-model=\"Ctrl.item.config.discount.siblingenrolled.enabled\"/>\n" +
    "                            <div class=\"well well-sm\" ng-show=\"Ctrl.item.config.pricing.discount.siblingenrolled.enabled\">\n" +
    "                                <label>Discount Amount</label>\n" +
    "                                <a href=\"#\" editable-text=\"Ctrl.item.config.discount.siblingenrolled.amount\">\n" +
    "                                    {{ Ctrl.item.config.discount.siblingenrolled.amount || 'not set' }}\n" +
    "                                </a>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </uib-tab>\n" +
    "            </uib-tabset>\n" +
    "\n" +
    "\n" +
    "\n" +
    "\n" +
    "        </div>\n" +
    "    </md-content>\n" +
    "</div>\n" +
    "");
}]);

angular.module("subscriptions/items/items.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("subscriptions/items/items.tpl.html",
    "<md-sidenav class=\"md-sidenav-left md-whiteframe-z2\" md-component-id=\"left\" >\n" +
    "        <md-toolbar layout=\"row\">\n" +
    "            <div class=\"md-toolbar-tools\" ng-controller=\"LeftCtrl\" >\n" +
    "                <h1>Filters</h1>\n" +
    "                <span flex></span>\n" +
    "                <md-button ng-click=\"close()\" class=\"md-primary\" md-sidenav-focus>Close</md-button>\n" +
    "            </div>\n" +
    "\n" +
    "        </md-toolbar>\n" +
    "        <md-content>\n" +
    "            <md-input-container flex>\n" +
    "                <label>State</label>\n" +
    "                <md-select aria-label placeholder=\"state\" ng-model=\"Ctrl.filters.state\">\n" +
    "                    <md-option ng-repeat=\"state in [{text:'current',value:1},{text:'archive',value:0}]\" value=\"{{state.value}}\">\n" +
    "                        {{state.text}}\n" +
    "                    </md-option>\n" +
    "                </md-select>\n" +
    "            </md-input-container>\n" +
    "            <md-input-container flex>\n" +
    "                <label>Status</label>\n" +
    "                <md-select aria-label placeholder=\"Status\" ng-model=\"Ctrl.filters.status\">\n" +
    "                    <md-option ng-repeat=\"status in Ctrl.statusOptions\" value=\"{{status.value}}\">\n" +
    "                        {{status.text}}\n" +
    "                    </md-option>\n" +
    "                </md-select>\n" +
    "            </md-input-container>\n" +
    "        </md-content>\n" +
    "    </md-sidenav>\n" +
    "    <md-toolbar>\n" +
    "        <div class=\"md-toolbar-tools\">\n" +
    "            <md-button class=\"md-icon-button\" aria-label=\"Settings\">\n" +
    "                <md-icon md-svg-icon=\"img/icons/menu.svg\"></md-icon>\n" +
    "            </md-button>\n" +
    "            <h2>\n" +
    "                <span>Subscriptions </span>\n" +
    "            </h2>\n" +
    "            Page: {{Ctrl.currentPage}}\n" +
    "            <span flex></span>\n" +
    "            <md-button ng-click=\"Ctrl.toggleLeft()\" ng-hide=\"Ctrl.isOpenLeft()\">\n" +
    "                Toggle Filters\n" +
    "            </md-button>\n" +
    "            <md-button aria-label=\"Create Product\" ui-sref=\"products.item\">\n" +
    "                <md-icon><i class=\"material-icons\">add_circle_outline</i></md-icon>\n" +
    "            </md-button>\n" +
    "        </div>\n" +
    "    </md-toolbar>\n" +
    "    <md-content>\n" +
    "        <md-subheader class=\"md-1-line\">\n" +
    "            <div layout=\"row\" flex>\n" +
    "                <div flex=\"5\"></div>\n" +
    "                <div flex=\"10\">Order</div>\n" +
    "                <div flex=\"10\">Account</div>\n" +
    "                <div flex=\"35\">Product</div>\n" +
    "                <div flex=\"15\">Start Date</div>\n" +
    "                <div flex>End Date</div>\n" +
    "            </div>\n" +
    "\n" +
    "        </md-subheader>\n" +
    "        <md-list ng-if=\"Ctrl.items.length\">\n" +
    "            <md-list-item class=\"md-1-line\"\n" +
    "                          dir-paginate=\"item in Ctrl.items | itemsPerPage: Ctrl.pageSize\"\n" +
    "                          current-page=\"Ctrl.currentPage\"\n" +
    "                          pagination-id=\"registrations\"\n" +
    "                          total-items=\"Ctrl.total_items\">\n" +
    "                <div flex=\"5\">\n" +
    "                    <a ui-sref=\"subscriptions.item({id:item.id})\" >\n" +
    "                        <i class=\"fa fa-edit\"></i>\n" +
    "                    </a>\n" +
    "                </div>\n" +
    "                <div flex=\"10\">\n" +
    "                    <a ui-sref=\"orders.item({id:item.order_id})\" >\n" +
    "                        <i class=\"fa fa-edit\"></i> {{item.order_id}}\n" +
    "                    </a>\n" +
    "                </div>\n" +
    "                <div flex=\"10\">\n" +
    "                    <a ui-sref=\"accounts.item({id:item.account_id})\" >\n" +
    "                        <i class=\"fa fa-edit\"></i> {{item.account_id}}\n" +
    "                    </a>\n" +
    "                </div>\n" +
    "                <div flex=\"35\">\n" +
    "                    {{item.product.title}}\n" +
    "                </div>\n" +
    "                <div flex=\"15\">\n" +
    "                    {{item.date_start * 1000 | date:'dd/MM/yyyy'}}\n" +
    "                </div>\n" +
    "                <div flex>\n" +
    "                    {{item.date_end * 1000 | date:'dd/MM/yyyy'}}\n" +
    "                </div>\n" +
    "            </md-list-item>\n" +
    "        </md-list>\n" +
    "        <dir-pagination-controls ng-if=\"Ctrl.items.length\"\n" +
    "                direction-links=\"true\"\n" +
    "                boundary-links=\"true\"\n" +
    "                auto-hide=\"true\"\n" +
    "                pagination-id=\"registrations\"\n" +
    "                ></dir-pagination-controls>\n" +
    "        <h1 ng-if=\"!Ctrl.items.length\">No Subscriptions To Display</h1>\n" +
    "    </md-content>\n" +
    "\n" +
    "\n" +
    "");
}]);

angular.module("transactions/item/transaction.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("transactions/item/transaction.tpl.html",
    "test");
}]);

angular.module("transactions/items/transactions.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("transactions/items/transactions.tpl.html",
    "<!DOCTYPE html>\n" +
    "<html lang=\"en\">\n" +
    "<head>\n" +
    "    <meta charset=\"UTF-8\">\n" +
    "    <title></title>\n" +
    "</head>\n" +
    "<body>\n" +
    "\n" +
    "</body>\n" +
    "</html>");
}]);

angular.module("users/item/item.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("users/item/item.tpl.html",
    "<div class=\"jumbotron\">\n" +
    "  <h1>Non-Trivial AngularJS Made Easy</h1>\n" +
    "\n" +
    "  <p class=\"lead\">\n" +
    "    Everything you need to kickstart AngularJS projects: a best-practice\n" +
    "    directory structure, an intelligent build system, and the best web design\n" +
    "    libraries around.\n" +
    "  </p>\n" +
    "\n" +
    "  <ul class=\"list-inline social-buttons\">\n" +
    "    <li>\n" +
    "      <iframe \n" +
    "        src=\"http://ghbtns.com/github-btn.html?user=ngbp&amp;repo=ngbp&amp;type=watch&amp;count=true\" \n" +
    "        allowtransparency=\"true\" \n" +
    "        frameborder=\"0\" \n" +
    "        scrolling=\"0\" \n" +
    "        width=\"110\" \n" +
    "        height=\"20\">\n" +
    "      </iframe>\n" +
    "    </li>\n" +
    "    <li>\n" +
    "      <iframe \n" +
    "        src=\"http://ghbtns.com/github-btn.html?user=ngbp&amp;repo=ngbp&amp;type=fork&amp;count=true\" \n" +
    "        allowtransparency=\"true\" \n" +
    "        frameborder=\"0\" \n" +
    "        scrolling=\"0\" \n" +
    "        width=\"95\" \n" +
    "        height=\"20\">\n" +
    "      </iframe>\n" +
    "    </li>\n" +
    "    <li>\n" +
    "       <iframe allowtransparency=\"true\" frameborder=\"0\" scrolling=\"no\"\n" +
    "        src=\"https://platform.twitter.com/widgets/tweet_button.html?url=http%3A%2F%2Fbit.ly%2FngBoilerplate&counturl=http%3A%2F%2Fngbp.github.com%2Fngbp&text=Check%20out%20%23ngbp%20-%20an%20awesome%20kickstarter%20for%20web%20projects%20%7C&hashtags=angularjs&via=joshdmiller&related=joshdmiller\"\n" +
    "        style=\"width:130px; height:20px;\"></iframe>\n" +
    "    </li>\n" +
    "    <li plus-one></li>\n" +
    "  </ul> \n" +
    "  \n" +
    "  <div class=\"btn-group\">\n" +
    "    <a href=\"https://github.com/ngbp/ngbp#readme\" class=\"btn btn-large btn-default\">\n" +
    "      <i class=\"fa fa-book\"></i>\n" +
    "      Read the Docs\n" +
    "    </a>\n" +
    "    <a href=\"https://github.com/ngbp/ngbp\" class=\"btn btn-large btn-success\">\n" +
    "      <i class=\"fa fa-download\"></i>\n" +
    "      Download\n" +
    "    </a>\n" +
    "  </div>\n" +
    "\n" +
    "</div>\n" +
    "\n" +
    "<div class=\"marketing\">\n" +
    "  <div class=\"row\">\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-thumbs-up\"></i> Good to Go!</h4>\n" +
    "      <p>\n" +
    "        Kickstarts your project quickly, with everything you need, so you can \n" +
    "        focus on what matters: your app.\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-magic\"></i> Complete Build System</h4>\n" +
    "      <p>\n" +
    "        A smart, <a href=\"http://gruntjs.com\">Grunt</a>-based build system \n" +
    "        designed to save you time and energy.\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-retweet\"></i> Modularization</h4>\n" +
    "      <p>\n" +
    "        Supports a structure that maintains separation of concerns while\n" +
    "        ensuring maximum code reuse.\n" +
    "      </p>\n" +
    "    </div>\n" +
    "  </div>\n" +
    "  <div class=\"row\">\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-star\"></i> AngularJS</h4>\n" +
    "      <p>\n" +
    "        JavaScript framework that augments browser-based, single-page \n" +
    "        applications with MVC functionality.\n" +
    "        <a href=\"http://angularjs.org\">More &raquo;</a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-resize-small\"></i> LESS CSS</h4>\n" +
    "      <p>\n" +
    "        The dynamic stylesheet language that extends CSS with efficiency.\n" +
    "        <a href=\"http://lesscss.org\">More &raquo;</a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-twitter\"></i> Twitter Bootstrap</h4>\n" +
    "      <p>\n" +
    "        Sleek, intuitive, and powerful front-end framework for faster and easier\n" +
    "        web development.\n" +
    "        <a href=\"http://getbootstrap.com\">More &raquo;</a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "  </div>\n" +
    "  <div class=\"row\">\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-circle\"></i> Angular UI Bootstrap</h4>\n" +
    "      <p>\n" +
    "        Pure AngularJS components for Bootstrap written by the \n" +
    "        <a href=\"https://github.com/angular-ui?tab=members\">AngularUI Team</a>.\n" +
    "        <a href=\"http://angular-ui.github.com/bootstrap\">More &raquo;</a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-flag\"></i> Font Awesome</h4>\n" +
    "      <p>\n" +
    "        The iconic font designed for use with Twitter Bootstrap.\n" +
    "        <a href=\"http://fortawesome.github.com/Font-Awesome\">\n" +
    "          More &raquo;\n" +
    "        </a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-asterisk\"></i> Placeholders</h4>\n" +
    "      <p>\n" +
    "        Client-side image and text placeholder directives written in pure \n" +
    "        AngularJS to make designing mock-ups wicked-fast.\n" +
    "        <a href=\"http://joshdmiller.github.com/angular-placeholders\">\n" +
    "          More &raquo;\n" +
    "        </a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "  </div>\n" +
    "</div>\n" +
    "\n" +
    "");
}]);

angular.module("users/users.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("users/users.tpl.html",
    "<div class=\"jumbotron\">\n" +
    "  <h1>Non-Trivial AngularJS Made Easy</h1>\n" +
    "\n" +
    "  <p class=\"lead\">\n" +
    "    Everything you need to kickstart AngularJS projects: a best-practice\n" +
    "    directory structure, an intelligent build system, and the best web design\n" +
    "    libraries around.\n" +
    "  </p>\n" +
    "\n" +
    "  <ul class=\"list-inline social-buttons\">\n" +
    "    <li>\n" +
    "      <iframe \n" +
    "        src=\"http://ghbtns.com/github-btn.html?user=ngbp&amp;repo=ngbp&amp;type=watch&amp;count=true\" \n" +
    "        allowtransparency=\"true\" \n" +
    "        frameborder=\"0\" \n" +
    "        scrolling=\"0\" \n" +
    "        width=\"110\" \n" +
    "        height=\"20\">\n" +
    "      </iframe>\n" +
    "    </li>\n" +
    "    <li>\n" +
    "      <iframe \n" +
    "        src=\"http://ghbtns.com/github-btn.html?user=ngbp&amp;repo=ngbp&amp;type=fork&amp;count=true\" \n" +
    "        allowtransparency=\"true\" \n" +
    "        frameborder=\"0\" \n" +
    "        scrolling=\"0\" \n" +
    "        width=\"95\" \n" +
    "        height=\"20\">\n" +
    "      </iframe>\n" +
    "    </li>\n" +
    "    <li>\n" +
    "       <iframe allowtransparency=\"true\" frameborder=\"0\" scrolling=\"no\"\n" +
    "        src=\"https://platform.twitter.com/widgets/tweet_button.html?url=http%3A%2F%2Fbit.ly%2FngBoilerplate&counturl=http%3A%2F%2Fngbp.github.com%2Fngbp&text=Check%20out%20%23ngbp%20-%20an%20awesome%20kickstarter%20for%20web%20projects%20%7C&hashtags=angularjs&via=joshdmiller&related=joshdmiller\"\n" +
    "        style=\"width:130px; height:20px;\"></iframe>\n" +
    "    </li>\n" +
    "    <li plus-one></li>\n" +
    "  </ul> \n" +
    "  \n" +
    "  <div class=\"btn-group\">\n" +
    "    <a href=\"https://github.com/ngbp/ngbp#readme\" class=\"btn btn-large btn-default\">\n" +
    "      <i class=\"fa fa-book\"></i>\n" +
    "      Read the Docs\n" +
    "    </a>\n" +
    "    <a href=\"https://github.com/ngbp/ngbp\" class=\"btn btn-large btn-success\">\n" +
    "      <i class=\"fa fa-download\"></i>\n" +
    "      Download\n" +
    "    </a>\n" +
    "  </div>\n" +
    "\n" +
    "</div>\n" +
    "\n" +
    "<div class=\"marketing\">\n" +
    "  <div class=\"row\">\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-thumbs-up\"></i> Good to Go!</h4>\n" +
    "      <p>\n" +
    "        Kickstarts your project quickly, with everything you need, so you can \n" +
    "        focus on what matters: your app.\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-magic\"></i> Complete Build System</h4>\n" +
    "      <p>\n" +
    "        A smart, <a href=\"http://gruntjs.com\">Grunt</a>-based build system \n" +
    "        designed to save you time and energy.\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-retweet\"></i> Modularization</h4>\n" +
    "      <p>\n" +
    "        Supports a structure that maintains separation of concerns while\n" +
    "        ensuring maximum code reuse.\n" +
    "      </p>\n" +
    "    </div>\n" +
    "  </div>\n" +
    "  <div class=\"row\">\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-star\"></i> AngularJS</h4>\n" +
    "      <p>\n" +
    "        JavaScript framework that augments browser-based, single-page \n" +
    "        applications with MVC functionality.\n" +
    "        <a href=\"http://angularjs.org\">More &raquo;</a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-resize-small\"></i> LESS CSS</h4>\n" +
    "      <p>\n" +
    "        The dynamic stylesheet language that extends CSS with efficiency.\n" +
    "        <a href=\"http://lesscss.org\">More &raquo;</a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-twitter\"></i> Twitter Bootstrap</h4>\n" +
    "      <p>\n" +
    "        Sleek, intuitive, and powerful front-end framework for faster and easier\n" +
    "        web development.\n" +
    "        <a href=\"http://getbootstrap.com\">More &raquo;</a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "  </div>\n" +
    "  <div class=\"row\">\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-circle\"></i> Angular UI Bootstrap</h4>\n" +
    "      <p>\n" +
    "        Pure AngularJS components for Bootstrap written by the \n" +
    "        <a href=\"https://github.com/angular-ui?tab=members\">AngularUI Team</a>.\n" +
    "        <a href=\"http://angular-ui.github.com/bootstrap\">More &raquo;</a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-flag\"></i> Font Awesome</h4>\n" +
    "      <p>\n" +
    "        The iconic font designed for use with Twitter Bootstrap.\n" +
    "        <a href=\"http://fortawesome.github.com/Font-Awesome\">\n" +
    "          More &raquo;\n" +
    "        </a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6 col-md-4\">\n" +
    "      <h4><i class=\"fa fa-asterisk\"></i> Placeholders</h4>\n" +
    "      <p>\n" +
    "        Client-side image and text placeholder directives written in pure \n" +
    "        AngularJS to make designing mock-ups wicked-fast.\n" +
    "        <a href=\"http://joshdmiller.github.com/angular-placeholders\">\n" +
    "          More &raquo;\n" +
    "        </a>\n" +
    "      </p>\n" +
    "    </div>\n" +
    "  </div>\n" +
    "</div>\n" +
    "\n" +
    "");
}]);

angular.module("venues/item/item.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("venues/item/item.tpl.html",
    "<md-toolbar>\n" +
    "    <div class=\"md-toolbar-tools\">\n" +
    "        <md-button class=\"md-icon-button\" aria-label=\"Settings\">\n" +
    "            <md-icon md-svg-icon=\"img/icons/menu.svg\"></md-icon>\n" +
    "        </md-button>\n" +
    "        <h2>\n" +
    "            Title: {{ Ctrl.item.title || '______________' }}\n" +
    "        </h2>\n" +
    "        <span flex></span>\n" +
    "        <md-button class=\"md-icon-button\" aria-label=\"Favorite\">\n" +
    "            <md-icon md-svg-icon=\"img/icons/favorite.svg\"></md-icon>\n" +
    "        </md-button>\n" +
    "        <md-button class=\"md-icon-button\" aria-label=\"More\" ng-click=\"Ctrl.saveItem()\">\n" +
    "            <md-icon><i class=\"material-icons\">check</i></md-icon>\n" +
    "        </md-button>\n" +
    "    </div>\n" +
    "</md-toolbar>\n" +
    "<md-content layout-padding flex>\n" +
    "\n" +
    "    <md-content layout=\"row\">\n" +
    "        <md-input-container flex>\n" +
    "            <label>ID</label>\n" +
    "            <input ng-model=\"Ctrl.item.id\" disabled>\n" +
    "        </md-input-container>\n" +
    "        <md-input-container flex>\n" +
    "            <label>Created</label>\n" +
    "            <input ng-model=\"Ctrl.item.created\" disabled>\n" +
    "        </md-input-container>\n" +
    "        <md-input-container flex>\n" +
    "            <label>Created By</label>\n" +
    "            <input ng-model=\"Ctrl.item.created_by\" disabled>\n" +
    "        </md-input-container>\n" +
    "        <md-input-container layout=\"row\" flex>\n" +
    "            <label>Status</label>\n" +
    "            <md-select ng-model=\"Ctrl.item.status\">\n" +
    "                <md-option ng-repeat=\"o in Ctrl.statusOptions\" value=\"{{o.text}}\">\n" +
    "                    {{o.text}}\n" +
    "                </md-option>\n" +
    "            </md-select>\n" +
    "        </md-input-container>\n" +
    "    </md-content>\n" +
    "    <md-content layout-padding layout=\"row\" layout-sm=\"column\">\n" +
    "        <div layout=\"row\">\n" +
    "            <md-input-container>\n" +
    "                <label>Title</label>\n" +
    "                <input ng-model=\"Ctrl.item.title\">\n" +
    "            </md-input-container>\n" +
    "            <md-input-container>\n" +
    "                <label>Website</label>\n" +
    "                <input ng-model=\"Ctrl.item.website\" type=\"url\">\n" +
    "            </md-input-container>\n" +
    "        </div>\n" +
    "        <div layout=\"row\">\n" +
    "            <md-input-container>\n" +
    "                <label>Email</label>\n" +
    "                <input ng-model=\"Ctrl.item.email\" type=\"email\">\n" +
    "            </md-input-container>\n" +
    "            <md-input-container>\n" +
    "                <label>Phone</label>\n" +
    "                <input ng-model=\"Ctrl.item.phone\" type=\"url\">\n" +
    "            </md-input-container>\n" +
    "        </div>\n" +
    "    </md-content>\n" +
    "    <md-content layout-padding>\n" +
    "        <md-input-container  class=\"md-block\">\n" +
    "            <label>Description</label>\n" +
    "            <textarea ng-model=\"Ctrl.item.description\" columns=\"1\" rows=\"5\"></textarea>\n" +
    "        </md-input-container>\n" +
    "    </md-content>\n" +
    "    <!--\n" +
    "    {{item.description}}\n" +
    "    {{item.image}}\n" +
    "    {{item.directions}}\n" +
    "    {{item.bookable}}\n" +
    "    {{item.capacity}}\n" +
    "    {{item.website}}\n" +
    "    {{item.email}}\n" +
    "    {{item.address_facility_street1}}\n" +
    "    {{item.address_facility_street2}}\n" +
    "    {{item.address_facility_city}}\n" +
    "    {{item.address_facility_state}}\n" +
    "    {{item.address_facility_postalcode}}\n" +
    "    {{item.address_facility_country}}\n" +
    "    {{item.address_shipping_street1}}\n" +
    "    {{item.address_shipping_street2}}\n" +
    "    {{item.address_shipping_city}}\n" +
    "    {{item.address_shipping_state}}\n" +
    "    {{item.address_shipping_postalcode}}\n" +
    "    {{item.address_shipping_country}}\n" +
    "    {{item.address_billing_street1}}\n" +
    "    {{item.address_billing_street2}}\n" +
    "    {{item.address_billing_city}}\n" +
    "    {{item.address_billing_state}}\n" +
    "    {{item.address_billing_postalcode}}\n" +
    "    {{item.address_billing_country}}\n" +
    "    {{item.phone}}\n" +
    "\n" +
    "    <!---------------------------\n" +
    "        start contact manager\n" +
    "    <!--------------------------->\n" +
    "\n" +
    "    <md-content layout-margin>\n" +
    "        <md-card>\n" +
    "            <md-card-content>\n" +
    "                <md-toolbar>\n" +
    "                    <div class=\"md-toolbar-tools\">\n" +
    "                        <h2>Contact Form</h2>\n" +
    "                        <span flex></span>\n" +
    "                        <md-button aria-label=\"Commit Contact\" ng-click=\"Ctrl.commitContact()\">\n" +
    "                            <md-icon><i class=\"material-icons\">check</i> </md-icon>\n" +
    "                        </md-button>\n" +
    "                        <md-button aria-label=\"Cancel Contact\" ng-click=\"Ctrl.cancelContact()\">\n" +
    "                            <md-icon><i class=\"material-icons\">cancel_circle_outline</i></md-icon>\n" +
    "                        </md-button>\n" +
    "                    </div>\n" +
    "                </md-toolbar>\n" +
    "                <md-content layout=\"row\" flex>\n" +
    "                    <md-input-container flex>\n" +
    "                        <label class=\"col-md-4 control-label\">Name</label>\n" +
    "                        <input type=\"text\" required  ng-model=\"Ctrl.tempContact.name\">\n" +
    "                    </md-input-container>\n" +
    "                    <md-divider></md-divider>\n" +
    "                    <md-input-container flex>\n" +
    "                        <label class=\"col-md-4 control-label\">Role</label>\n" +
    "                        <input type=\"text\" required  ng-model=\"Ctrl.tempContact.role\">\n" +
    "                    </md-input-container>\n" +
    "                </md-content>\n" +
    "                <md-content layout=\"row\" flex>\n" +
    "                    <md-input-container flex>\n" +
    "                        <label class=\"col-md-4 control-label\">Phone</label>\n" +
    "                        <input type=\"text\" required  ng-model=\"Ctrl.tempContact.phone\">\n" +
    "                    </md-input-container>\n" +
    "                    <md-input-container flex>\n" +
    "                        <label class=\"col-md-4 control-label\">Email</label>\n" +
    "                        <input type=\"text\" required  ng-model=\"Ctrl.tempContact.email\">\n" +
    "                    </md-input-container>\n" +
    "                </md-content>\n" +
    "            </md-card-content>\n" +
    "        </md-card>\n" +
    "        <md-card>\n" +
    "            <div class=\"md-card-content\">\n" +
    "                <md-list ng-if=\"Ctrl.item.contacts.length\">\n" +
    "                    <md-subheader class=\"md-1-line\" >\n" +
    "                        <div layout=\"row\" layout-align=\"space-around center\" flex>\n" +
    "                            <div flex=\"20\">Name</div>\n" +
    "                            <div flex=\"15\">Role</div>\n" +
    "                            <div flex=\"20\">Phone</div>\n" +
    "                            <div flex=\"20\">Email</div>\n" +
    "                        </div>\n" +
    "                    </md-subheader>\n" +
    "                    <md-list-item class=\"md-1-line\" ng-repeat=\"item in Ctrl.item.contacts\" >\n" +
    "                        <div ng-click=\"Ctrl.editContact($index)\" layout=\"row\" layout-align=\"space-around center\" flex>\n" +
    "                            <div flex=\"20\">{{item.name}}</div>\n" +
    "                            <div flex=\"15\">{{item.role}}</div>\n" +
    "                            <div flex=\"20\">{{item.phone}}</div>\n" +
    "                            <div flex=\"20\">{{item.email}}</div>\n" +
    "                        </div>\n" +
    "                    </md-list-item>\n" +
    "                </md-list>\n" +
    "            </div>\n" +
    "        </md-card>\n" +
    "    </md-content>\n" +
    "\n" +
    "    <!--------------------------------\n" +
    "            end contact manager\n" +
    "    ---------------------------------->\n" +
    "\n" +
    "    <div layout=\"column\" ng-cloak class=\"md-inline-form\">\n" +
    "\n" +
    "        <md-content layout-padding>\n" +
    "            <md-input-container class=\"md-block\">\n" +
    "                <label>Address</label>\n" +
    "                <input ng-model=\"Ctrl.item.address_facility_street1\">\n" +
    "            </md-input-container>\n" +
    "            <md-input-container md-no-float class=\"md-block\">\n" +
    "                <input ng-model=\"Ctrl.item.address_facility_street2\" placeholder=\"Address 2\">\n" +
    "            </md-input-container>\n" +
    "            <div layout layout-sm=\"column\">\n" +
    "                <md-input-container flex>\n" +
    "                    <label>City</label>\n" +
    "                    <input ng-model=\"Ctrl.item.address_facility_city\">\n" +
    "                </md-input-container>\n" +
    "                <md-input-container flex>\n" +
    "                    <label>County</label>\n" +
    "                    <md-select ng-model=\"Ctrl.item.address_facility_state\">\n" +
    "                        <md-option ng-repeat=\"county in Ctrl.countyOptions\" value=\"{{county.text}}\">\n" +
    "                            {{county.text}}\n" +
    "                        </md-option>\n" +
    "                    </md-select>\n" +
    "                </md-input-container>\n" +
    "            </div>\n" +
    "            <div layout layout-sm=\"column\">\n" +
    "                <md-input-container flex>\n" +
    "                    <label>Country</label>\n" +
    "                    <input ng-model=\"Ctrl.item.address_facility_country\">\n" +
    "                </md-input-container>\n" +
    "                <md-input-container flex>\n" +
    "                    <label>Postal Code</label>\n" +
    "                    <input name=\"postalCode\" ng-model=\"Ctrl.item.address_facility_postalcode\" placeholder=\"12345\"\n" +
    "                           required ng-pattern=\"/^[0-9]{5}$/\" md-maxlength=\"5\">\n" +
    "                    <div ng-messages=\"postalCode.$error\" role=\"alert\" multiple>\n" +
    "                        <div ng-message=\"required\" class=\"my-message\">You must supply a postal code.</div>\n" +
    "                        <div ng-message=\"pattern\" class=\"my-message\">Postal code must be 5 digits.</div>\n" +
    "                    </div>\n" +
    "                </md-input-container>\n" +
    "            </div>\n" +
    "            <md-input-container class=\"md-block\">\n" +
    "                <label>Directions</label>\n" +
    "                <textarea ng-model=\"Ctrl.item.directions\" columns=\"1\" rows=\"5\"></textarea>\n" +
    "            </md-input-container>\n" +
    "        </md-content>\n" +
    "    </div>\n" +
    "\n" +
    "\n" +
    "</md-content>\n" +
    "");
}]);

angular.module("venues/items/venues.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("venues/items/venues.tpl.html",
    "<md-sidenav class=\"md-sidenav-left md-whiteframe-z2\" md-component-id=\"left\" >\n" +
    "    <md-toolbar layout=\"row\">\n" +
    "        <div class=\"md-toolbar-tools\" ng-controller=\"LeftCtrl\" >\n" +
    "            <h1>Filters</h1>\n" +
    "            <span flex></span>\n" +
    "            <md-button ng-click=\"close()\" class=\"md-primary\" md-sidenav-focus>Close</md-button>\n" +
    "        </div>\n" +
    "\n" +
    "    </md-toolbar>\n" +
    "    <md-content>\n" +
    "        <md-input-container flex>\n" +
    "            <label>State</label>\n" +
    "            <md-select aria-label placeholder=\"state\" ng-model=\"Ctrl.filters.state\">\n" +
    "                <md-option ng-repeat=\"state in [{text:'current',value:1},{text:'archive',value:0}]\" value=\"{{state.value}}\">\n" +
    "                    {{state.text}}\n" +
    "                </md-option>\n" +
    "            </md-select>\n" +
    "        </md-input-container>\n" +
    "        <md-input-container flex>\n" +
    "            <label>Status</label>\n" +
    "            <md-select placeholder=\"Status\" ng-model=\"Ctrl.filters.status\">\n" +
    "                <md-option ng-repeat=\"status in Ctrl.statusOptions\" value=\"{{status.value}}\">\n" +
    "                    {{status.text}}\n" +
    "                </md-option>\n" +
    "            </md-select>\n" +
    "        </md-input-container>\n" +
    "        <md-input-container>\n" +
    "            <label>Town/City</label>\n" +
    "            <input ng-model=\"Ctrl.filters.city\"/>\n" +
    "        </md-input-container>\n" +
    "        <md-input-container>\n" +
    "            <label>Activities</label>\n" +
    "            <md-select placeholder=\"Status\" ng-model=\"Ctrl.filters.status\" multiple>\n" +
    "                <md-option ng-repeat=\"activity in Ctrl.activityOptions\" value=\"{{activity.value}}\">\n" +
    "                    {{activity.text}}\n" +
    "                </md-option>\n" +
    "            </md-select>\n" +
    "        </md-input-container>\n" +
    "    </md-content>\n" +
    "</md-sidenav>\n" +
    "\n" +
    "<md-toolbar>\n" +
    "    <div class=\"md-toolbar-tools\">\n" +
    "        <md-button class=\"md-icon-button\" aria-label=\"Settings\">\n" +
    "            <md-icon md-svg-icon=\"img/icons/menu.svg\"></md-icon>\n" +
    "        </md-button>\n" +
    "        <h2>\n" +
    "            <span>Venues</span>\n" +
    "        </h2>\n" +
    "        <span flex></span>\n" +
    "        <md-button class=\"md-icon-button\" aria-label=\"Favorite\">\n" +
    "            <md-icon md-svg-icon=\"img/icons/favorite.svg\"></md-icon>\n" +
    "        </md-button>\n" +
    "        <md-button class=\"md-icon-button\" aria-label=\"More\" ui-sref=\"venues.item\">\n" +
    "            <md-icon><i class=\"material-icons\">add_circle_outline</i></md-icon>\n" +
    "        </md-button>\n" +
    "    </div>\n" +
    "</md-toolbar>\n" +
    "\n" +
    "<md-content flex>\n" +
    "    <md-subheader>\n" +
    "        <div layout=\"row\" layout-align=\"space-around center\" flex>\n" +
    "            <div flex=\"20\">Name</div>\n" +
    "            <div flex=\"20\">Town/City</div>\n" +
    "            <div flex=\"20\">Postcode</div>\n" +
    "            <div flex=\"20\">Phone</div>\n" +
    "            <div flex=\"20\">Email</div>\n" +
    "        </div>\n" +
    "    </md-subheader>\n" +
    "    <md-list ng-if=\"Ctrl.items.length\" >\n" +
    "        <md-list-item class=\"md-1-line\" ng-repeat=\"item in Ctrl.items\" >\n" +
    "            <div layout=\"row\" layout-align=\"space-around center\" flex>\n" +
    "                <div flex=\"25\">\n" +
    "                    <a ui-sref=\"venues.item({id:item.id})\" >\n" +
    "                        <i class=\"fa fa-edit\"></i> {{item.title}}\n" +
    "                    </a>\n" +
    "                </div>\n" +
    "                <div flex=\"20\">{{item.address_facility_city}}</div>\n" +
    "                <div flex=\"15\">{{item.address_facility_postalcode}}</div>\n" +
    "                <div flex=\"20\">{{item.phone}}</div>\n" +
    "                <div flex=\"20\">{{item.email}}</div>\n" +
    "            </div>\n" +
    "        </md-list-item>\n" +
    "    </md-list>\n" +
    "    <h1 ng-if=\"!Ctrl.items.length\">No Venues To Display</h1>\n" +
    "</md-content>");
}]);
