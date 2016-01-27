angular.module('templates-common', ['directives/selectrrule/rrule_recurring_select.tpl.html', 'services/modal/login/login.tpl.html', 'services/modal/select/default.tpl.html']);

angular.module("directives/selectrrule/rrule_recurring_select.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("directives/selectrrule/rrule_recurring_select.tpl.html",
    "<div class=\"rrule-recurring-select\">\n" +
    "  <h3>Repeat</h3>\n" +
    "\n" +
    "  <div class=\"frequency-type\">\n" +
    "    <select ng-model=\"selectedFrequency\" ng-options=\"frequency as frequency.name for frequency in frequencies\" ng-change=\"resetData()\" required>\n" +
    "    </select>\n" +
    "  </div>\n" +
    "\n" +
    "  <div class=\"interval\">\n" +
    "    Every <input type=\"text\" ng-model=\"interval\" ng-change=\"calculateRRule()\" /> {{selectedFrequency.type}}(s):\n" +
    "  </div>\n" +
    "\n" +
    "  <div class=\"weekly\" ng-if=\"selectedFrequency.type == 'week'\">\n" +
    "    <ul>\n" +
    "      <li ng-repeat=\"day in weekDays\" ng-click=\"toggleSelected(day)\" ng-class=\"{ selected: day.selected }\">\n" +
    "        {{day.name}}\n" +
    "      </li>\n" +
    "    </ul>\n" +
    "  </div>\n" +
    "\n" +
    "  <div class=\"monthly {{selectedMonthFrequency}}\" ng-if=\"selectedFrequency.type == 'month'\">\n" +
    "    <input type=\"radio\" ng-model=\"selectedMonthFrequency\" ng-click=\"selectMonthFrequency('day_of_month')\" value=\"day_of_month\"/>Day of month\n" +
    "    <input type=\"radio\" ng-model=\"selectedMonthFrequency\" ng-click=\"selectMonthFrequency('day_of_week')\" value=\"day_of_week\"/>Day of week\n" +
    "\n" +
    "    <ul class=\"month-days\">\n" +
    "      <li ng-repeat=\"day in monthDays\" ng-click=\"toggleSelected(day)\" ng-class=\"{ selected: day.selected }\" ng-if=\"selectedMonthFrequency == 'day_of_month'\">\n" +
    "        {{day.day}}\n" +
    "      </li>\n" +
    "    </ul>\n" +
    "\n" +
    "    <ul class=\"month-week-days\">\n" +
    "      <li ng-repeat=\"week in monthWeeklyDays\" ng-if=\"selectedMonthFrequency == 'day_of_week'\">\n" +
    "        <ul class=\"week-days\">\n" +
    "          <li class=\"week-index-title\">{{$index + 1}}{{weekOrdinals[$index]}}</li>\n" +
    "          <li ng-repeat=\"day in week\" ng-click=\"toggleSelected(day)\" ng-class=\"{ selected: day.selected }\">\n" +
    "            {{ day.name }}\n" +
    "          </li>\n" +
    "        </ul>\n" +
    "      </li>\n" +
    "    </ul>\n" +
    "  </div>\n" +
    "\n" +
    "  <div class=\"yearly\" ng-if=\"selectedFrequency.type == 'year'\">\n" +
    "    <label for=\"yearMonth\">Months: </label>\n" +
    "    <ul class='year-months'>\n" +
    "      <li ng-repeat=\"yearMonth in yearMonths\" class=\"year-month\">\n" +
    "        <input type=\"checkbox\" value=\"yearMonth.value\" ng-checked=\"yearMonth.selected\" ng-click=\"toggleSelected(yearMonth)\" id=\"year-month-{{yearMonth.value}}\">\n" +
    "        <label for=\"year-month-{{yearMonth.value}}\">{{ yearMonth.name }}</label>\n" +
    "      </li>\n" +
    "    </ul>\n" +
    "    <!-- <select name=\"yearMonth\" ng-model=\"selectedYearMonth\" ng-options=\"yearMonth as yearMonth.name for yearMonth in yearMonths track by yearMonth.value\" ng-change=\"calculateRRule()\" required></select> -->\n" +
    "    <br />\n" +
    "    <label for=\"yearMonthDay\">Day of Month: </label>\n" +
    "     <ul class='year-month-days'>\n" +
    "      <li ng-repeat=\"monthDay in yearMonthDays\" class=\"year-month-day\">\n" +
    "        <input type=\"checkbox\" value=\"monthDay.value\" ng-checked=\"monthDay.selected\" ng-click=\"toggleSelected(monthDay)\" id=\"year-month-day-{{monthDay.value}}\">\n" +
    "        <label for=\"year-month-day-{{monthDay.value}}\">{{ monthDay.day }}</label>\n" +
    "      </li>\n" +
    "    </ul>\n" +
    "  </div>\n" +
    "\n" +
    "  <div class=\"actions\">\n" +
    "    <hr />\n" +
    "\n" +
    "    <div class=\"summary\">\n" +
    "      Summary: {{selectedFrequency.name}}\n" +
    "      <div class=\"description\">\n" +
    "        {{ recurrenceRule.toText() }}\n" +
    "      </div>\n" +
    "    </div>\n" +
    "\n" +
    "    <div class=\"button ok\" ng-if=\"showButtons\" ng-click=\"okClick()\">Ok</div>\n" +
    "    <div class=\"button cancel\" ng-if=\"showButtons\" ng-click=\"cancelClick()\">Cancel</div>\n" +
    "  </div>\n" +
    "</div>\n" +
    "");
}]);

angular.module("services/modal/login/login.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("services/modal/login/login.tpl.html",
    "<!-- views/loginModalTemplate.html -->\n" +
    "\n" +
    "<div ng-controller=\"LoginModalCtrl as Ctrl\">\n" +
    "\n" +
    "        <div class=\"form-group col-xs-12 col-sm-6 col-md-6 col-lg-6\">\n" +
    "            <div class=\"form-control\">\n" +
    "                User Type:\n" +
    "                <a href=\"#\" editable-select=\"Ctrl.userId\" e-ng-options=\"o.value as o.text for o in Ctrl.userTypeOptions\">\n" +
    "                    {{ Ctrl.showUserTypeOptions() }}\n" +
    "                </a>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "\n" +
    "        <button ng-click=\"Ctrl.submit()\">Submit</button>\n" +
    "        <button ng-click=\"Ctrl.cancel()\">Cancel</button>\n" +
    "\n" +
    "\n" +
    "\n" +
    "    <div style=\"display: none;\">\n" +
    "        <form ng-submit=\"Ctrl.submit()\">\n" +
    "            <input type=\"email\" ng-model=\"_email\" />\n" +
    "            <input type=\"password\" ng-model=\"_password\" />\n" +
    "        </form>\n" +
    "\n" +
    "    </div>\n" +
    "\n" +
    "\n" +
    "</div>");
}]);

angular.module("services/modal/select/default.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("services/modal/select/default.tpl.html",
    "<!-- views/loginModalTemplate.html -->\n" +
    "\n" +
    "<div >\n" +
    "default\n" +
    "\n" +
    "\n" +
    "\n" +
    "</div>");
}]);
