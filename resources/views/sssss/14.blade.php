                      @for ($c = 1; $c < 10; $c++)
                          <table class="main-table">
                              <thead>
                                  <tr class="colored-header-row">

                                      <td style="border: 1px solid #000;" colspan="1"> {{ $c }}/3</td>
                                      <td style="border: 1px solid #000;" colspan="3">الفصل</td>

                                  </tr>
                                  <tr class="colored-header-row">

                                      <td style="border: 1px solid #000;" colspan="1">اسم المعلمة</td>
                                      <td style="border: 1px solid #000;" colspan="1">الحصص</td>
                                      <td style="border: 1px solid #000;" colspan="1">المواد</td>

                                      <td style="border: 1px solid #000;" colspan="1">عدد المواد</td>

                                  </tr>
                              </thead>
                              <tbody>
                                  @for ($i = 1; $i < 8; $i++)
                                      <tr>
                                          <?php $classroom = $classrooms->where('name', 'ثالث ثانوي أدبي')->first();
                                          
                                          $scc = $schedules->where('school_id', $school_id)->where('row_id', $i)->where('class_id', $c)->where('grade_id', $classroom->grade_id)->where('classroom_id', $classroom->id)->first();
                                          if (isset($scc) && $scc != null) {
                                              $teeee = $scc->teacher_id;
                                              $teec = $scc->subject_id;
                                          } else {
                                              $teeee = ' ';
                                              $teec = '  ';
                                          }
                                          
                                          ?>
                                          <td style="border: 1px solid #000;"> {{ $teeee }}
                                          </td>
                                          <td style="border: 1px solid #000;">5</td>
                                          <td style="border: 1px solid #000;">
                                              {{ $teec }}
                                          </td>
                                          <td style="border: 1px solid #000;">{{ $i }}</td>

                                      </tr>
                                  @endfor
                                  <tr>
                                      <td style="border: 1px solid #000;" colspan="4">مجموع الحصص 32</td>
                                  </tr>

                              </tbody>
                          </table>
                      @endfor
