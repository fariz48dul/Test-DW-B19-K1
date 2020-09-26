program kecepatan;
                         uses crt;
                         var
                                    jam1, jam2, jamwaktu, interval, jaminterval, sisawaktu :  longint;
                                   v, totjarak, i, jarak, sisajarak : longint;
                         begin
                                   clrscr;

                                   jam1 := 10*3600 + 25*60 + 21;
                                   jam2 := 12*3600;
                                   jamwaktu := jam2-jam1;

                                  
                                  interval := 11*60;
                                 
                                 jaminterval := jamwaktu  div interval;
                                 sisawaktu := jamwaktu mod interval;

                                 

                                 v := 6;
                                 totjarak :=0;
                                 i := 1;

                                while i<=jaminterval do
                                begin
                                       jarak := interval*v;
                                       totjarak := totjarak+jarak;

                                       v := v+1;
                                        i := i+1;
                               end;

                              
                              sisajarak := sisawaktu*v;
                              

                              totjarak := totjarak+sisajarak;
                              writeln('total jarak yang ditempuh : ',totjarak , 'm');

                             readln();
                      end.