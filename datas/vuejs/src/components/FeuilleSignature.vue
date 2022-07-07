<template>
  <div id="contentToPrint">
    <section id="logo"></section>
    <entete-feuille></entete-feuille>
    <section id="stagiaires">
      <article>
        <presences-stagiaire></presences-stagiaire>
      </article>
    </section>
  </div>
</template>

<script>
import { store } from '../store.js'
import EnteteFeuille from './EnteteFeuille.vue'
import PresencesStagiaire from './PresencesStagiaire.vue'

export default {
  name: 'FeuilleSignature',
  components: {
    EnteteFeuille,
    PresencesStagiaire
  },
  data () {
    return {
      Etat: store.state
    }
  }

}
</script>

<style>
    #contentToPrint {
        position: relative;

        display: grid;
        grid-template-columns: 40mm auto;
        grid-template-rows: 25mm auto;
        grid-template-areas:
            "logo        entete    "
            "stagiaires  stagiaires"
            "stagiaires  stagiaires";

        /*orientation: landscape;*/
        font-family: Arial, Helvetica, sans-serif;
    }

    #logo {
        grid-area: logo;
    }

    #entete-feuille {
        grid-area: entete;
        align-self: flex-end;
    }

    #stagiaires {
        grid-area: stagiaires;
    }

    #picto {    /* affichage du picto à l'écran mais pas sur le PDF */
        position: absolute;
        top:3mm;
        left:12.5mm;
        z-index: 10;
        background-image: url(../../public/images/web.png);
        background-repeat: no-repeat;
        background-position: center;
        width: 25mm;
        height: 25mm;
    }

    #partenaires {
        position: absolute;
        top:10mm;
        left:360mm;
        z-index: 10;
        width: 40mm;
        height:180mm;
        background-image: url(../../public/images/banniereCF2M.jpg);
        background-repeat: no-repeat;
        background-size: contain;
    }

    #pdf_icone {
        position: absolute;
        top:200mm;
        left:360mm;
        z-index: 10;
        height:25mm;
        width: 20mm;
        background-image: url(../../public/images/icone-download-pdf.png);
        background-repeat: no-repeat;
        background-size: contain;
        box-shadow: 5px 5px 10px 5px #888;
        animation: pulsation 2s ease 1s infinite normal forwards;
    }

    @keyframes pulsation {
        0% {
            animation-timing-function: ease-out;
            transform: scale(1);
            transform-origin: center center;
        }

        10% {
            animation-timing-function: ease-in;
            transform: scale(0.91);
        }

        17% {
            animation-timing-function: ease-out;
            transform: scale(0.98);
        }

        33% {
            animation-timing-function: ease-in;
            transform: scale(0.87);
        }

        45% {
            animation-timing-function: ease-out;
            transform: scale(1);
        }
    }

/*
    .espacePicto {  // zone laissée vide pour prévoir l'espace occupé par le picto
        height: 15mm;
        width: 41mm;
    }

*/
    table, tr, td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    .groupe {
        background-color: orange;
        color: blue;
        font-weight: bold;
        font-size: 125%;
    }

    .groupe, .annee, .periode, .jour, .moment, .formateur {
        text-align: center;
        width: 30mm;
    }

    .stagiaire {
        display: flex;
        flex-flow: row nowrap;
    }

    .identite {
        font-size: 100%;
        width:40mm;
        height:20mm;
        text-align: center;
        line-height: 10mm;
        border: 1px solid black;
        margin: 0;
    }

</style>
