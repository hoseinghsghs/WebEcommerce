<div>
    <li class="body">
        <ul class="menu list-unstyled">
            <!-- <li>
                <a href="javascript:void(0);">
                    <div class="icon-circle bg-blue"><i class="zmdi zmdi-account"></i></div>
                    <div class="menu-info">
                        <h4>8 عضو جدید عضو شدند</h4>
                        <p><i class="zmdi zmdi-time"></i> 14 دقیقه پیش </p>
                    </div>
                </a>
            </li> -->
            @foreach ($evorders as $evorder)
            <li>
                @php
                if($evorder->eventable_type == "App\Models\Order"){
                $icon="zmdi zmdi-case";
                $bg="bg-green";
                $url=route('admin.orders.show' , $evorder->eventable_id );
                }elseif($evorder->eventable_type == "App\Models\Comment"){
                $icon="zmdi zmdi-assignment-o";
                $bg="bg-blue";
                $url=route('admin.comments.edit' , $evorder->eventable_id );
                }elseif($evorder->eventable_type == "App\Models\User"){
                $icon="zmdi zmdi-account";
                $bg="bg-yellow";
                $url=route('admin.users.show' , $evorder->eventable_id );
                }
                @endphp


                <a href="{{$url}}">
                    <div class="icon-circle {{$bg}}"><i class="{{$icon}}"></i></div>
                    <div class="menu-info">
                        <h4 style="float: right;">{{$evorder-> title}}</h4>
                        </br>
                        <h4 style="float: right;">{{$evorder-> body}}</h4>
                        <!-- <h4>{{Hekmatinasser\Verta\Verta::instance($evorder->expired_at)->format('Y/n/j H:i:s')}}</h4> -->
                        <?php
                        $v2 = Hekmatinasser\Verta\Verta::instance($evorder->created_at);
                        $v3=$v2->diffMinutes();
                        $v4=$v3." " ."دقیقه";
                        if($v3 <= 0){
                        $v4=" لحظاتی پیش " ;
                        }
                        if($v3>60){
                        $v3=$v2->diffHours();
                        $v4=$v3." " ."ساعت";
                            if($v3>60){
                            $v3=$v2->diffDays();
                            $v4=$v3." " ."روز";
                            }
                        }
                        ?>
                        </br>
                        <p style="float: right;"><i class="zmdi zmdi-time"></i><span> {{ $v4 }} </span></p>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
    </li>
</div>