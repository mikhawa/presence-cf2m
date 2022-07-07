export const Donnees = [
  {
    promotion_id: 25,
    promotion_acronym: 'WEB2022',
    debutSemaine: '04/07/2022',
    finSemaine: '08/07/2022',
    emptySheet: false,
    stagiaires: [
      {
        userid: 12,
        nom: 'Sandron',
        prenom: 'Pierre',
        events: [
          { day: '2', periode: 'AM', remote: false, type: 'R', retard: '09:15', depart: '', msg: '' },
          { day: '4', periode: 'PM', remote: false, type: 'D', retard: '', depart: '16:00', msg: '' },
          { day: '5', periode: 'AMPM', remote: false, type: 'A', retard: '', depart: '', msg: '' }
        ]
      },
      {
        userid: 14,
        nom: 'Pitz',
        prenom: 'Michael',
        events: [
          { day: '1', periode: 'AM', remote: false, type: 'A', retard: '', depart: '', msg: '' },
          { day: '1', periode: 'PM', remote: false, type: 'A', retard: '', depart: '', msg: '' },
          { day: '3', periode: 'PM', remote: false, type: 'RD', retard: '13:30', depart: '16:15', msg: '' }
        ]
      },
      {
        userid: 22,
        nom: 'Palmisano',
        prenom: 'André',
        events: []
      }
    ]
  }
]
