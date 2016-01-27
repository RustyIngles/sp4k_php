/**
 * Created by Ironman on 11/18/2015.
 */

/*
 *
 *	jQuery Sliding Menu Plugin
 *	Mobile app list-style navigation in the browser
 *
 *	Written by Ali Zahid
 *	http://designplox.com/jquery-sliding-menu
 *
 */

(function($)
{
    var usedIds = [];

    $.fn.menu = function(options)
    {
        var selector = this.selector;

        var settings = $.extend(
            {
                dataJSON: false,
                backLabel: 'Back',
                callback: angular.noop()

            }, options);

        return this.each(function()
        {
            var self = this,
                menu = $(self),
                data;

            if (menu.hasClass('sliding-menu'))
            {
                return;
            }

            var menuWidth = menu.width();

            data = processJSON(settings.dataJSON);

            menu.empty().addClass('sliding-menu');

            var rootPanel;

            $(data).each(function(index, item)
            {
                var panel = $('<ul></ul>');

                if (item.root)
                {
                    rootPanel = '#' + item.id;
                }

                panel.attr('id', item.id);
                panel.addClass('menu-panel');
                panel.width(menuWidth);

                $(item.children).each(function(index, item)
                {




                    var li = $('<li></li>');

                    if(typeof this.styleClass == 'undefined'  || this.styleClass =='nav'){

                        var selectButton = $(
                            '<button aria-label="Select Item" class="md-button md-default-theme">' +
                            '<md-icon><i class="material-icons">check_circle_outline</i></md-icon>'+
                            '</button>'
                        ).on('click',function(){
                                settings.callback(item);
                            }
                        );


                        li.append(selectButton);
                    }

                    var link = $('<a></a>');

                    link.attr('class', item.styleClass);
                    link.attr('href', item.href ? item.href : '#');
                    link.text(item.title);

                    li.append(link);

                    panel.append(li);

                });

                menu.append(panel);

            });

            rootPanel = $(rootPanel);
            rootPanel.addClass('menu-panel-root');

            var currentPanel = rootPanel;

            menu.height(rootPanel.height());

            var wrapper = $('<div></div>').addClass('sliding-menu-wrapper').width(data.length * menuWidth);

            menu.wrapInner(wrapper);

            wrapper = $('.sliding-menu-wrapper', menu);

            $('a', self).on('click', function(e)
            {
                var href = $(this).attr('href'),
                    title = $(this).text();

                if (wrapper.is(':animated'))
                {
                    e.preventDefault();

                    return;
                }

                if (href == '#')
                {
                    e.preventDefault();
                }
                else if (href.indexOf('#menu-panel') == 0)
                {
                    var target = $(href),
                        isBack = $(this).hasClass('back'),
                        marginLeft = parseInt(wrapper.css('margin-left'));

                    if (isBack)
                    {
                        if (href == '#menu-panel-back')
                        {
                            target = currentPanel.prev();
                        }

                        wrapper.stop(true, true).animate(
                            {
                                marginLeft: marginLeft + menuWidth

                            }, 'fast');
                    }
                    else
                    {
                        target.insertAfter(currentPanel);

                        if (settings.backLabel === true)
                        {
                            $('.back', target).text(title);
                        }
                        else
                        {
                            $('.back', target).text(settings.backLabel);
                        }

                        wrapper.stop(true, true).animate(
                            {
                                marginLeft: marginLeft - menuWidth

                            }, 'fast');
                    }

                    currentPanel = target;

                    menu.stop(true, true).animate(
                        {
                            height: target.height()

                        }, 'fast');

                    e.preventDefault();
                }

            });

            return this;

        });



        function processJSON(data, parent)
        {
            var root = { id: 'menu-panel-' + getNewId(), children: [], root: (parent ? false : true) },
                panels = [];

            if (parent)
            {
                root.children.push(
                    {
                        styleClass: 'back',
                        href: '#' + parent.id

                    });
            }

            $(data).each(function(index, item)
            {
                root.children.push(item);

                if (item.children)
                {
                    var panel = processJSON(item.children, root);

                    item.href = '#' + panel[0].id;
                    item.styleClass = 'nav';

                    panels = panels.concat(panel);
                }

            });

            return [root].concat(panels);
        }

        function getNewId()
        {
            var id;

            do
            {
                id = Math.random().toString(36).substring(3, 8);
            }
            while (usedIds.indexOf(id) >= 0);

            usedIds.push(id);

            return id;
        }

    };

} (jQuery));