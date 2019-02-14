<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('toggle_navigation','Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>
            @lang("test:test4","test")
            <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('login','Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('register','Register') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('logout','Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>


<div class="row">

    <div id="visual_design" style="background: red;padding: 5px" class="col-8 my-0">

    </div>
    <div id="visual_elements" style="background: blue;padding: 5px" class="col-4 my-0">
        <div class="item nestedable" style="background: cyan;padding: .75rem 1.25rem;margin: 10px 0 0 0"
             data-type="detail">
            detail
        </div>
        <div class="item nestedable" style="background: green;padding: .75rem 1.25rem;margin: 10px 0 0 0"
             data-type="detail">
            detail 2
        </div>
    </div>

</div>

<script>
    function toJSON(node) {
        node = node || this;
        var obj = {
            nodeType: node.nodeType
        };
        if (node.tagName) {
            obj.tagName = node.tagName.toLowerCase();
        } else if (node.nodeName) {
            obj.nodeName = node.nodeName;
        }
        if (node.nodeValue) {
            obj.nodeValue = node.nodeValue;
        }
        var attrs = node.attributes;
        if (attrs) {
            var length = attrs.length;
            var arr = obj.attributes = new Array(length);
            for (var i = 0; i < length; i++) {
                attr = attrs[i];
                arr[i] = [attr.nodeName, attr.nodeValue];
            }
        }
        var childNodes = node.childNodes;
        if (childNodes) {
            length = childNodes.length;
            arr = obj.childNodes = new Array(length);
            for (i = 0; i < length; i++) {
                arr[i] = toJSON(childNodes[i]);
            }
        }
        console.log(obj);
        return obj;
    }

    function toDOM(obj) {
        if (typeof obj == 'string') {
            obj = JSON.parse(obj);
        }
        var node, nodeType = obj.nodeType;
        switch (nodeType) {
            case 1: //ELEMENT_NODE
                node = document.createElement(obj.tagName);
                var attributes = obj.attributes || [];
                for (var i = 0, len = attributes.length; i < len; i++) {
                    var attr = attributes[i];
                    node.setAttribute(attr[0], attr[1]);
                }
                break;
            case 3: //TEXT_NODE
                node = document.createTextNode(obj.nodeValue);
                break;
            case 8: //COMMENT_NODE
                node = document.createComment(obj.nodeValue);
                break;
            case 9: //DOCUMENT_NODE
                node = document.implementation.createDocument();
                break;
            case 10: //DOCUMENT_TYPE_NODE
                node = document.implementation.createDocumentType(obj.nodeName);
                break;
            case 11: //DOCUMENT_FRAGMENT_NODE
                node = document.createDocumentFragment();
                break;
            default:
                return node;
        }
        if (nodeType == 1 || nodeType == 11) {
            var childNodes = obj.childNodes || [];
            for (i = 0, len = childNodes.length; i < len; i++) {
                node.appendChild(toDOM(childNodes[i]));
            }
        }
        return node;
    }
</script>
<script type="text/javascript">
    (function () {
        'use strict';
        var id = function (id) {
            return document.getElementById(id);
        };

        var onAdd = function (evt) {
            new Sortable(evt.item, {
                group: 'shared',
                // animation: 150,
                // invertSwap: true,
                sort: true,
                invertSwap: true,
                fallbackOnBody: true,
                onAdd
            });
        };

        var _visual_design = Sortable.create(visual_design, {
            sort: true,
            invertSwap: true,
            fallbackOnBody: true,
            group: 'shared',
            onAdd
        });

        var _visual_elements = new Sortable(visual_elements, {
            group: {
                name: 'shared',
                pull: 'clone',
                put: false // Do not allow items to be put into this list
            },
            sort: false
        });

        console.log(visual_elements, visual_design);
    })();
</script>


</body>
</html>
