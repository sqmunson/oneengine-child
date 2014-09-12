<?php
/**
 * Template Name: Custom Home Page With Bubbles
 */
?>
<?php
global $post;
get_header();
?>

<div class="main">
    <div class="wrapper">
        <h1 id="harness">HARNESS THE POWER OF <span class="pink">ATTENTION</span></h1>
        <div class="learn-more">Learn More</div>
    </div>
</div>


<div id="bg">
    <div class="point" id="1">
        <div class="hover"></div>
        <div class="bubble-container">
            <div class="bubble">
                <h2>David X.</h2>
                <ul>
                    <li>Loves doing things</li>
                    <li>Buys lots of stuff</li>
                    <li>Drives a car</li>
                    <li>Hates shopping</li>
                    <li>Eats ice cream</li>
                </ul>
            </div>
            <div class="triangle triangle-left"></div>
        </div>
    </div>
    <div class="point" id="2">
        <div class="hover"></div>
        <div class="bubble-container">
            <div class="bubble">
                <h2>Rachel A.</h2>
                <ul>
                    <li>Loves shopping</li>
                    <li>Buys lots of shoes</li>
                    <li>Rides bikes drunk</li>
                    <li>Hates hairy men</li>
                    <li>Eats sushi everyday</li>
                </ul>
            </div>
            <div class="triangle triangle-left"></div>
        </div>
    </div>
    <div class="point" id="3">
        <div class="hover"></div>
        <div class="bubble-container">
            <div class="bubble">
                <h2>Susan P.</h2>
                <ul>
                    <li>Loves watching TV</li>
                    <li>Cooks lavish meals</li>
                    <li>Hates the subway</li>
                    <li>Leaves town on the weekend</li>
                    <li>Eats healthy</li>
                </ul>
            </div>
            <div class="triangle triangle-left"></div>
        </div>
    </div>
    <div class="point" id="4">
        <div class="hover"></div>
        <div class="bubble-container">
            <div class="bubble">
                <h2>Megan B.</h2>
                <ul>
                    <li>Loves getting together with the ladies</li>
                    <li>Buys more than she should</li>
                    <li>Drives a Mercedes</li>
                    <li>Hates bald men</li>
                    <li>Eats kale salad everyday</li>
                </ul>
            </div>
            <div class="triangle triangle-right"></div>
        </div>
    </div>
    <div class="point" id="5">
        <div class="hover"></div>
        <div class="bubble-container">
            <div class="bubble">
                <h2>Will T.</h2>
                <ul>
                    <li>Loves watching sports</li>
                    <li>Buys useless stuff on eBay</li>
                    <li>Rides a Vespa</li>
                    <li>Hates when people text while walking</li>
                    <li>Eats burgers</li>
                </ul>
            </div>
            <div class="triangle triangle-right"></div>
        </div>
    </div>
    <div class="point" id="6">
        <div class="hover"></div>
        <div class="bubble-container">
            <div class="bubble">
                <h2>Bill W.</h2>
                <ul>
                    <li>Loves cats</li>
                    <li>Buys lots of cat food</li>
                    <li>Doesn't drive</li>
                    <li>Hates running out of milk</li>
                    <li>Eats dinner alone</li>
                </ul>
            </div>
            <div class="triangle triangle-right"></div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

<script src="wp-content/themes/oneengine-child/js/jquery.fittext.js"></script>

<script>
        jQuery(function() {
            var $ = jQuery,
                BG_HEIGHT = 742,
                BG_WIDTH = 1200,
                BG_ASPECT_RATIO = BG_HEIGHT / BG_WIDTH,
                points = [
                    {
                        x: 230,
                        y: 623
                    },
                    {
                        x: 324,
                        y: 605
                    },
                    {
                        x:471,
                        y:599
                    },
                    {
                        x:616,
                        y:592
                    },
                    {
                        x:874,
                        y:587
                    },
                    {
                        x:1103,
                        y:603
                    }
                ];

            function initZones() {
                points.forEach(function(point) {
                    point.Xper = point.x / BG_WIDTH;
                    point.Yper = point.y / BG_HEIGHT;
                });

                setZones();
            }

            function setZones() {
                var currWidth = window.innerWidth,
                    currHeight = window.innerHeight,
                    currAspectRatio = currHeight / currWidth,
                    Xpoint, Ypoint, tempWidth, tempHeight;

                points.forEach(function(point, index) {
                    if (currAspectRatio > BG_ASPECT_RATIO) {
                        // console.log('vertical');

                        tempWidth = BG_WIDTH * (currHeight / BG_HEIGHT);
                        Xpoint = (tempWidth * point.Xper) - (0.5 * (tempWidth - currWidth));
                        Ypoint = currHeight * (1 - point.Yper);

                        $('#' + (index+1) + ' .hover').css('width', (100 * (currHeight / BG_HEIGHT)) + 'px')
                        $('#' + (index+1) + ' .hover').css('height', (150 * (currHeight / BG_HEIGHT )) + 'px');
                        $('#' + (index+1) + ' .hover').css('left', -((100 * (currHeight / BG_HEIGHT)) / 2) + 'px')
                    }

                    if (currAspectRatio < BG_ASPECT_RATIO) {
                        // console.log('horizontal');

                        tempHeight = BG_HEIGHT * (currWidth / BG_WIDTH );
                        Ypoint = tempHeight * (1 - point.Yper);
                        Xpoint = currWidth * point.Xper;

                        $('#' + (index+1) + ' .hover').css('width', (100 * (currWidth / BG_WIDTH)) + 'px')
                        $('#' + (index+1) + ' .hover').css('height', (150 * (currWidth / BG_WIDTH )) + 'px');
                        $('#' + (index+1) + ' .hover').css('left', -((100 * (currWidth / BG_WIDTH)) / 2) + 'px')
                    }

                    $('#' + (index+1) ).css('bottom', Ypoint);
                    $('#' + (index+1) ).css('left', Xpoint);

                });
            }

            function setBubblePosition(bubble) {
                var bubbleRectangle = $(bubble).find('.bubble'),
                    bubbleTriangle = $(bubble).find('.triangle'),
                    rect = bubble[0].getBoundingClientRect(),
                    pointRect = bubble[0].parentElement.getBoundingClientRect(),
                    h = window.innerHeight,
                    w = window.innerWidth;

                var widthWithBubble = rect.left +
                        bubbleRectangle.width() +
                        parseInt(bubbleRectangle.css('padding-right').match(/(\d+)/)[0]) +
                        parseInt(bubbleRectangle.css('padding-left').match(/(\d+)/)[0]);

                if (rect.left >= 0 && widthWithBubble <= w) {
                    // use defaults
                    bubbleRectangle.css('left',0);
                    bubbleTriangle.css('left', 50);
                }

                if (rect.width > w) {
                    // width bigger than viewport
                    bubble.css('width', w + 'px');
                    bubble.css('left', 0);
                }

                // move the triangle
                if (pointRect.left < 20) {
                    bubbleTriangle.css('left', 75 - pointRect.left);
                }
                if (pointRect.right > w - 20) {
                    bubbleTriangle.css('left', 60 + w - pointRect.right);
                }

                // move the bubble
                if (rect.left < 0) {
                    bubbleRectangle.css('left',-(rect.left));
                }
                if (widthWithBubble > w) {
                    bubbleRectangle.css('left',  w - widthWithBubble);
                }
            }

            function doPopUp() {
                var isBubble = this.className.indexOf('bubble-container') > -1;

                if (isBubble) {
                    $(this).addClass('active');
                } else {
                    $(this).next('.bubble-container').fadeIn(500);
                    setBubblePosition($(this).next('.bubble-container'));
                }
            }

            function hidePopUp() {
                console.log(this);
                var isBubble = this.className.indexOf('bubble-container') > -1;

                if (isBubble) {
                    $(this).fadeOut(300);
                } else {
                    $(this).next('.bubble-container').fadeOut(300);
                }
            }

            // kick things off!
            initZones();

            // set zones when window resizes or orientation changes
            $(window).resize(setZones);
            $(window).on('orientationchange', setZones);

            // set zone hover handler
            $('.hover').hover(doPopUp, hidePopUp);
            $('.bubble-container').hover(doPopUp, hidePopUp);

            // set zone click handler
            $('.hover').click(function() {
                $(this).next('.bubble-container').fadeToggle(500);
            });
            $('.bubble-container').click(function() {
                $(this).fadeOut(300);
            });

            // init headline fit text
            jQuery("#harness").fitText(1.0, { minFontSize: '20px', maxFontSize: '60px' });

        });
    </script>
</body>
</html>