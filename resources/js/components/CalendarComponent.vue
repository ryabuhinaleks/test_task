<template>
  <div class="container">
    <div id='calendar'></div>
  </div>
</template>

<script>
export default {
        props:[
            'urldata',
            'num',
        ],
        mounted() {

                let calendarEl = document.getElementById('calendar');
                let idUser=this.num;
                let calendar = new FullCalendar.Calendar(calendarEl, {
                
                        eventClick: function(info) {
                              let user_event=info.event.extendedProps.user_id;
                              if(user_event!=idUser)
                                  document.location.href = "/events/"+info.event.id; 
                              else
                                  document.location.href = "/events/"+info.event.id+"/edit"; 
                          },
                          headerToolbar: {
                              left: 'prevYear,prev,next,nextYear today',
                              center: 'title',
                              right: 'dayGridMonth,dayGridWeek,dayGridDay'
                          },
                          locale: 'ru',
                          navLinks: true,
                          editable: false,
                          dayMaxEvents: false,

                          events: this.urldata,
                          validRange: {
                            start: new Date()
                          },
                          firstDay: 1,
                          buttonText: {
                          today: "Сегодня",
                          month: "Месяц",
                          week: "Неделя",
                          day: "День"
                          }

                  }); 
                       
                      calendar.render();            
        },
        methods:{

        }
    }
</script>

