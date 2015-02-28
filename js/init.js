/**
 * init.js
 * Release 2014.08.27.150000
 */
;(function ($, window, undefined) {

    // markers
    var marker = [
        {
            'addr': [
                '25.039065815333753',
                '121.56097412109375'
            ],
            'text': '<strong>110台灣台北市信義區逸仙路28號</strong>',
            'label': '請點我',
            'css': 'labels',
            'event': {
                'click' : function (e) {
                    alert('緯度: ' + e.latLng.lat() + ', 經度: ' + e.latLng.lng());
                },
                'mouseover': {
                    'func': function (e) {
                        alert('我只能執行一次');
                    },
                    'once': true
                }
            },
            // 自訂圖示
            'icon': {
                'url': 'big.png',
                'scaledSize': [64, 64]
            },
            // 動畫效果
            'animation': 'DROP'
        },
        {'addr': ['25.04151536540612', '121.56354904174805'], 'text': '<strong>110台灣台北市信義區忠孝東路四段559巷8號</strong>'},
        {'addr': ['25.041282077030896', '121.56741142272949'], 'text': '<strong>110台灣台北市信義區忠孝東路五段131號</strong>'},
        {'addr': ['25.0383270525352', '121.57045841217041'], 'text': '<strong>110台灣台北市信義區松高路68號</strong>'},
        {'addr': ['25.034516521123315','121.56496524810791'], 'text': '<strong>110台灣台北市信義區台北101</strong>'},
        {'addr': ['25.037627167884715', '121.56732559204102'], 'text': '<strong>110台灣台北市信義區松壽路20巷</strong>'},
        {'addr': ['25.039726809855434', '121.55633926391602'], 'text': '<strong>106台灣台北市大安區光復南路280巷25號</strong>'},
        {'addr': ['25.037160575899154', '121.55350685119629'], 'text': '<strong>106台灣台北市大安區仁愛路四段300巷11號</strong>'},
        {'addr': ['25.035877438787317', '121.55715465545654'], 'text': '<strong>106台灣台北市大安區光復南路440-1號</strong>'},
        {'addr': ['25.033972149830436', '121.56063079833984'], 'text': '<strong>110台灣台北市信義區莊敬路</strong>'},
        {'addr': ['25.031794640503858', '121.56414985656738'], 'text': '<strong>110台灣台北市信義區松勤街80號</strong>'},
        {'addr': ['25.035255306871402', '121.56998634338379'], 'text': '<strong>110台灣台北市信義區松勇路47號</strong>'},
        {'addr': ['25.033855498524844', '121.5686559677124'], 'text': '<strong>110台灣台北市信義區松仁路130號</strong>'},
        {'addr': ['25.036927279240775', '121.57376289367676'], 'text': '<strong>110台灣台北市信義區松德路168巷12弄9號</strong>'},
        {'addr': ['25.041593128099265', '121.5723466873169'], 'text': '<strong>110台灣台北市信義區忠孝東路五段295巷5號</strong>'},
        {'addr': ['25.04485911668452', '121.56917095184326'], 'text': '<strong>110台灣台北市信義區松隆路61號</strong>'},
        {'addr': ['25.04536455952624', '121.56402111053467'], 'text': '<strong>110台灣台北市信義區市民大道</strong>'},
        {'addr': ['25.04380934412532', '121.55998706817627'], 'text': '<strong>110台灣台北市信義區光復南路133號</strong>'},
        {'addr': ['25.041904178378704', '121.55848503112793'], 'text': '<strong>110台灣台北市信義區光復南路169巷14號</strong>'},
        {'addr': ['25.038521464229383', '121.55900001525879'], 'text': '<strong>110台灣台北市信義區仁愛路四段450號</strong>'}
    ],
    // polygon
    polygon = [
        {
            'coords': [
                ['25.05922799282222', '121.52348791503903'],
                ['25.05580687982226', '121.52331625366207'],
                ['25.05425179688806', '121.52795111083981'],
                ['25.05751744826025', '121.53378759765621'],
                ['25.064048489938642', '121.52915274047848'],
                ['25.05922799282222', '121.52348791503903']
            ],
            'color': '#000033',
            'fillcolor': '#0000cc',
            'width': 1,
            'event': function (e) {
                alert('You clicked at: ' + e.latLng.lat() + ', ' + e.latLng.lng());
            }
        }
    ],
    // polyline
    polyline = [
        {
            'coords': [
                ['25.05176362315452', '121.54683386230465'],
                ['25.0587614830369', '121.55301367187496'],
                ['25.05673992011185', '121.56005178833004'],
            ],
            'color': '#008800',
            'width': 2
        }
    ],
    // circle
    circle = [
        {
            'center': ['25.047924', '121.51708099999996'],
            'radius': 500,
            'width': 1,
            'color': '#333333',
            'fillcolor': '#999999',
            'event': {
                'click': function (e) {
                    alert('You clicked at: ' + e.latLng.lat() + ', ' + e.latLng.lng());
                }
            }
        },
        {
            'center': ['25.038', '121.56399999999996'],
            'radius': 400,
            'width': 3,
            'color': '#FF0000',
            'fillcolor': '#CC0000',
        }
    ],
    // direction
    direction = [
        {
            'from': '臺北市大安區羅斯福路四段一號',
            'fromText': '起點: 羅斯福路四段',
            'waypoint': [
                {'location': '台北市信義區仁愛路4段505號', 'text': '仁愛路中繼點'},
                {'location': '臺北市松山區南京東路4段2號', 'text': '南京東路中繼點'}
            ],
            'to': '臺北市北平西路三號',
            'toText': '終點: 北平西路',
            'travel': 'driving',
            'panel': '#direction-panel',
            'icon': {
                'from': 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
                'to': 'http://maps.google.com/mapfiles/ms/icons/purple-dot.png',
                'waypoint': '3.png'
            },
            'event': {
                'directions_changed': {
                    'func': function () {
                        console.log('路徑規劃完成');
                    }
                }
        }
        }
    ];

    // Default map
    // $('#map-default').tinyMap();
    
    // Markers
    $('#map-markers').tinyMap({
        'center': ['25.04151536540612', '121.56354904174805'],
        'zoom': 16,
        'marker': marker,
        'markerFitBounds': true
    });
    
    // Direction
    $('#map-direction').tinyMap({
        'center': '臺北市大安區羅斯福路四段一號',
        'zoom': 13,
        'direction': direction
    });
    
    // Drawing
    $('#map-draw').tinyMap({
        'center': '台北市安東街35巷',
        'zoom': 13,
        'polyline': polyline,
        'polygon': polygon,
        'circle': circle
    });
    
    // KML
    $('#map-kml').tinyMap({
        'center': ['38.210669', '140.883812'],
        'zoom': 12,
        'kml': 'https://maps.google.com.tw/maps/ms?authuser=0&vps=3&gl=tw&brcurrent=h3,0x346ef3065c07572f:0xe711f004bf9c5469&ie=UTF8&msa=0&output=kml&msid=211638096894483184187.0004e0743b42ed2befe27'
    });
    
    // Panto
    $('#map-panto').tinyMap({
        'zoom': 16,
        'center': '故宮博物院'
    });
    
    // Map Control
    $('#map-control').tinyMap({
        'center': ['25.05176362315452', '121.54683386230465'],
        'zoom': 13
    });
    
    // MarkerCluster
    $('#map-cluster').tinyMap({
        'center': ['25.033972149830436', '121.56063079833984'],
        'zoom': 13,
        'marker': marker.slice(1),
        'markerCluster': true
    });

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var obj = $(this),
            act = obj.data('action');

        if (act) {
            switch (act) {
            case 'map-markers':
                $('#' + act).tinyMap({
                    'center': ['25.04151536540612', '121.56354904174805'],
                    'zoom': 16,
                    'marker': marker,
                    'markerFitBounds': true
                });
                break;
            }
        }
        //e.target // activated tab
        //e.relatedTarget // previous tab
    });

    // Autowidth for Google+ comment
    (function () {
        var width = $('.container:first').outerWidth() - 30,
            html = '<div class="g-comments" data-href="http://app.essoduke.org/tinyMap/" data-width="' + width + '" data-first_party_property="BLOGGER" data-view_type="FILTERED_POSTMOD"></div>';
        $('#comment-box').html(html);
    }());

    // Events
    $(document)
        .on('click', '[data-menu=anchor] li>a', function (e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: ($(this.hash).offset().top - 50)
            }, 'slow');
        })
        .on('click', '[data-panto]', function () {
            $('#map-panto').tinyMap('panto', $(this).data('panto'));
        })
        .on('click', '[data-map-control]', function () {
            var obj = $(this),
                map = $('#map-control'),
                act = obj.data('map-control'),
                opt = {},
                toggle = (obj.data('toggle') || 0);

            switch (act.toString().toLowerCase()) {
            case 'polyline':
                opt = {
                    'polyline': polyline
                }
                break;
            case 'circle':
                opt = {
                    'circle': [circle[0]]
                };
                break;
            case 'direction':
                opt = {
                    'direction': direction
                };
                break;
            case 'markers':
                opt = {
                    'marker': [marker[0]]
                };
                break;
            case 'zoom':
                opt.zoomControl = 0 === toggle % 2 ? false : true;
                break;
            case 'type':
                opt.mapTypeControl = 0 === toggle % 2 ? false : true;
                break;
            case 'settype':
                opt.mapTypeId = 0 === toggle % 2 ?
                                google.maps.MapTypeId.SATELLITE :
                                google.maps.MapTypeId.ROADMAP;
                break;
            case 'drag':
                opt.draggable = 0 === toggle % 2 ? false : true;
                break;
            case 'streetview':
                opt.streetView = {
                    visible: 0 === toggle %2 ? true : false
                };
                break;
            case 'clear':
                map.tinyMap('clear');
                $('[data-map-control]').removeClass('btn-success').addClass('btn-default');
                return;
            }
            
            if (0 === toggle % 2) {
                obj.removeClass('btn-default').addClass('btn-success');
            } else {
                obj.removeClass('btn-success').addClass('btn-default');
            }
            map.tinyMap('modify', opt);
            obj.data('toggle', ++toggle);
        });

    $('#parameters table tr .value:first-child, #parameters table tr .text').addClass('hidden-xs');
    $('#methods table .value, #methods table .text').addClass('hidden-xs');

    // analytics
    $('[data-ga]').on('click', function () {
        var type = $(this).data('ga');
        ga('send', 'event', 'button', 'download', type);
    });

}(window.jQuery || {}, window));
//#EOF
