
        <div class="col-sm-10 col-md-11 main">
          <div class="row" style="margin-right:0px;">
            <h1 class="page-header"><?php if($this->session->userdata('role') == 1) echo "User "; else echo "Guide "?>Booking List</h1>
          </div>
        <?$this->load->model('booking');?>
        <div class="row" >
            <div class="col-md-12" style="padding-left:0px;">
              <div class="panel panel-default">
                <div class="panel-heading"><strong>Your Details</strong></div>
                <table class="table table-bordered table-striped table-responsive">
                    <thead>
                        <th><?php if($this->session->userdata('role') == 1) echo "Guide "; else echo "User "?> Name</th>
                        <th>Booking Date</th>
                        <th>Location</th>
                        <th>Booking Detail</th>
                        <th>E-mail</th>
                        <th>Phone</th>
                        <th>Price</th>
                        <?php if($this->session->userdata('role') == 1):?><th style="text-align: center;">Rating</th><?endif;?>
                    </thead>
                  <tbody>
                      <?php $index=0; foreach($allBookings as $booking):?>
                      <?php if(!isset($prices[$booking['booking_date']])):?>
                        <?php $prices[$booking['booking_date']] = 0;?>
                      <?php endif;?>
                      <tr>
                        <td><?=$booking['firstname'].$booking['lastname']?></td>
                        <td><?=$booking['booking_date']?></td>
                        <td><?=$booking['location']?></td>
                        <td><?=$booking['booking_detail']?></td>
                        <td><?=$booking['email']?></td>
                        <td><?=$booking['phone']?></td>
                        <td><?=$booking['price']?></td>
                        <?
                           $prices[$booking['booking_date']]+=$booking['price'];
                            $dates[] = $booking['booking_date'];
                        ?>
                        <?php if($this->session->userdata('role') == 1):?>
                        <td>
                            <?
                               $ratingResult = $this->booking->getRating(array('member_id' => $this->session->userdata('id'), 'guide_id' => $booking['guide_id']));
                            ?>
                            <div class="wrapper">
                                <span class="rating">
                                    <input id="rating5<?echo $index;?>" type="radio" name="rating<?echo $index;?>" data-guide="<?echo $booking['guide_id']?>" <? if(isset($ratingResult->rating) && $ratingResult->rating == 5):?>checked="checked" <?endif;?> value="5" onclick="setrank(this)">
                                    <label for="rating5<?echo $index;?>">5</label>
                                    <input id="rating4<? echo $index;?>" type="radio" name="rating<?echo $index;?>" data-guide="<?echo $booking['guide_id']?>" <? if(isset($ratingResult->rating) && $ratingResult->rating == 4):?>checked="checked" <?endif;?> value="4" onclick="setrank(this)">
                                    <label for="rating4<? echo $index;?>">4</label>
                                    <input id="rating3<? echo $index;?>" type="radio" name="rating<?echo $index;?>" data-guide="<?echo $booking['guide_id']?>" <? if(isset($ratingResult->rating) && $ratingResult->rating == 3):?>checked="checked" <?endif;?> value="3" onclick="setrank(this)">
                                    <label for="rating3<? echo $index;?>">3</label>
                                    <input id="rating2<? echo $index;?>" type="radio" name="rating<?echo $index;?>" data-guide="<?echo $booking['guide_id']?>" <? if(isset($ratingResult->rating) && $ratingResult->rating == 2):?>checked="checked" <?endif;?> value="2" onclick="setrank(this)">
                                    <label for="rating2<?echo $index;?>">2</label>
                                    <input id="rating1<? echo $index;?>" type="radio" name="rating<?echo $index;?>" data-guide="<?echo $booking['guide_id']?>" <? if(isset($ratingResult->rating) && $ratingResult->rating == 1):?>checked="checked" <?endif;?> value="1" onclick="setrank(this)">
                                    <label for="rating1<?echo $index;?>">1</label>
                                </span>
                           </div>
                           <?$index++;?>
                        </td>
                        <?endif;?>
                      </tr>
                     <?endforeach;?>
                  </tbody>
                  <script>
                  function setrank(obj){
                      
                      guide = jQuery("#"+obj.id).data("guide");
                       $.ajax({
                            url: '<?php echo site_url('/admin/bookings/rating'); ?>',
                            type: 'POST',
                            data: {
                                rating: obj.value,
                                guide_id : guide,
                            },
                            dataType: 'json',
                            success: function(data) {
                                console.log(data);
                            }
                        });
                   
                  }
                  
                  </script>
                </table>
              </div>
            </div>
            
          </div>
              <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
         </div>

<script>

Highcharts.theme = {
   colors: ['#2b908f', '#90ee7e', '#f45b5b', '#7798BF', '#aaeeee', '#ff0066', '#eeaaee',
      '#55BF3B', '#DF5353', '#7798BF', '#aaeeee'],
   chart: {
      backgroundColor: {
         linearGradient: { x1: 0, y1: 0, x2: 1, y2: 1 },
         stops: [
            [0, '#2a2a2b'],
            [1, '#3e3e40']
         ]
      },
      style: {
         fontFamily: '\'Unica One\', sans-serif'
      },
      plotBorderColor: '#606063'
   },
   title: {
      style: {
         color: '#E0E0E3',
         textTransform: 'uppercase',
         fontSize: '20px'
      }
   },
   subtitle: {
      style: {
         color: '#E0E0E3',
         textTransform: 'uppercase'
      }
   },
   xAxis: {
      gridLineColor: '#707073',
      labels: {
         style: {
            color: '#E0E0E3'
         }
      },
      lineColor: '#707073',
      minorGridLineColor: '#505053',
      tickColor: '#707073',
      title: {
         style: {
            color: '#A0A0A3'

         }
      }
   },
   yAxis: {
      gridLineColor: '#707073',
      labels: {
         style: {
            color: '#E0E0E3'
         }
      },
      lineColor: '#707073',
      minorGridLineColor: '#505053',
      tickColor: '#707073',
      tickWidth: 1,
      title: {
         style: {
            color: '#A0A0A3'
         }
      }
   },
   tooltip: {
      backgroundColor: 'rgba(0, 0, 0, 0.85)',
      style: {
         color: '#F0F0F0'
      }
   },
   plotOptions: {
      series: {
         dataLabels: {
            color: '#B0B0B3'
         },
         marker: {
            lineColor: '#333'
         }
      },
      boxplot: {
         fillColor: '#505053'
      },
      candlestick: {
         lineColor: 'white'
      },
      errorbar: {
         color: 'white'
      }
   },
   legend: {
      itemStyle: {
         color: '#E0E0E3'
      },
      itemHoverStyle: {
         color: '#FFF'
      },
      itemHiddenStyle: {
         color: '#606063'
      }
   },
   credits: {
      style: {
         color: '#666'
      }
   },
   labels: {
      style: {
         color: '#707073'
      }
   },

   drilldown: {
      activeAxisLabelStyle: {
         color: '#F0F0F3'
      },
      activeDataLabelStyle: {
         color: '#F0F0F3'
      }
   },

   navigation: {
      buttonOptions: {
         symbolStroke: '#DDDDDD',
         theme: {
            fill: '#505053'
         }
      }
   },

   // scroll charts
   rangeSelector: {
      buttonTheme: {
         fill: '#505053',
         stroke: '#000000',
         style: {
            color: '#CCC'
         },
         states: {
            hover: {
               fill: '#707073',
               stroke: '#000000',
               style: {
                  color: 'white'
               }
            },
            select: {
               fill: '#000003',
               stroke: '#000000',
               style: {
                  color: 'white'
               }
            }
         }
      },
      inputBoxBorderColor: '#505053',
      inputStyle: {
         backgroundColor: '#333',
         color: 'silver'
      },
      labelStyle: {
         color: 'silver'
      }
   },

   navigator: {
      handles: {
         backgroundColor: '#666',
         borderColor: '#AAA'
      },
      outlineColor: '#CCC',
      maskFill: 'rgba(255,255,255,0.1)',
      series: {
         color: '#7798BF',
         lineColor: '#A6C7ED'
      },
      xAxis: {
         gridLineColor: '#505053'
      }
   },

   scrollbar: {
      barBackgroundColor: '#808083',
      barBorderColor: '#808083',
      buttonArrowColor: '#CCC',
      buttonBackgroundColor: '#606063',
      buttonBorderColor: '#606063',
      rifleColor: '#FFF',
      trackBackgroundColor: '#404043',
      trackBorderColor: '#404043'
   },

   // special colors for some of the
   legendBackgroundColor: 'rgba(0, 0, 0, 0.5)',
   background2: '#505053',
   dataLabelsColor: '#B0B0B3',
   textColor: '#C0C0C0',
   contrastTextColor: '#F0F0F3',
   maskColor: 'rgba(255,255,255,0.3)'
};

// Apply the theme
Highcharts.setOptions(Highcharts.theme);
// Create the chart
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Total price list '
    },
    subtitle: {
        text: 'Click the columns to view versions. Source: <a href="http://netmarketshare.com">netmarketshare.com</a>.'
    },
    xAxis: {
        type: 'category',
        title: {
            text: 'Date Wise'
        }
    },
    yAxis: {
        title: {
            text: 'Price'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>:<b>₹{point.y}<br/>'
    },

    series: [{
        name: 'Price List',
        colorByPoint: true,
        data: [
            <?foreach($dates as $key => $date):?>
                {
                name: "<?=$date?>",
                y: <?=$prices[$date]?>,
                drilldown:"<?=$date?>"
            },
            <?endforeach;?>
    ]
    }],

});
</script>
