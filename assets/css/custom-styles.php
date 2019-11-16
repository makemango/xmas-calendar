

/* mobile first grid layout */
body {
  background: #f4cdc6; /* Old browsers */
  background: -moz-linear-gradient(top, #f4cdc6 0%, #f6d9d4 50%, #f6d9d4 52%, #fefefd 100%); /* FF3.6-15 */
  background: -webkit-linear-gradient(top, #f4cdc6 0%,#f6d9d4 50%,#f6d9d4 52%,#fefefd 100%); /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(to bottom, #f4cdc6 0%,#f6d9d4 50%,#f6d9d4 52%,#fefefd 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f4cdc6', endColorstr='#fefefd',GradientType=0 ); /* IE6-9 */
  background-repeat: none;
  background-attachment: fixed;
  align-content: center;
}


* {
  box-sizing: border-box;
}

body {
  font-family: "Montserrat";
  min-height: 100vh;
  justify-content: center;
  align-items: center;
}

.btn {
  padding: 5px 5px;
  display: inline-flex;
  background: #000;
  color: #f2cbc2;
  text-decoration: none;
  transition: 0.35s ease-in-out;
  font-weight: 700;
}
.btn:hover {
  background: red;
  color: #f2cbc2;
}

.overlay {
  width: 100%;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  padding: 40px;
  position: fixed;
  top: 0;
  left: 0;
  background: rgba(0, 0, 0, 0.75);
  opacity: 0;
  pointer-events: none;
  transition: 0.35s ease-in-out;
  max-height: 100vh;
  overflow-y: auto;
}
.overlay.open {
  opacity: 1;
  pointer-events: inherit;
}
.overlay .modal {
    background: #f4cdc6; /* Old browsers */
  background: -moz-linear-gradient(top, #f4cdc6 0%, #f6d9d4 50%, #f6d9d4 52%, #fefefd 100%); /* FF3.6-15 */
  background: -webkit-linear-gradient(top, #f4cdc6 0%,#f6d9d4 50%,#f6d9d4 52%,#fefefd 100%); /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(to bottom, #f4cdc6 0%,#f6d9d4 50%,#f6d9d4 52%,#fefefd 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f4cdc6', endColorstr='#fefefd',GradientType=0 ); /* IE6-9 */
  text-align: center;
  padding: 40px 80px;
  box-shadow: 0px 1px 10px rgba(17, 0, 0, 0.075);
  opacity: 0;
  pointer-events: none;
  transition: 0.35s ease-in-out;
  max-height: 100vh;
  overflow-y: auto;
}
.overlay .modal.open {
  opacity: 1;
  pointer-events: inherit;
  background: #f4cdc6; /* Old browsers */
  background: -moz-linear-gradient(top, #f4cdc6 0%, #f6d9d4 50%, #f6d9d4 52%, #fefefd 100%); /* FF3.6-15 */
  background: -webkit-linear-gradient(top, #f4cdc6 0%,#f6d9d4 50%,#f6d9d4 52%,#fefefd 100%); /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(to bottom, #f4cdc6 0%,#f6d9d4 50%,#f6d9d4 52%,#fefefd 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f4cdc6', endColorstr='#fefefd',GradientType=0 ); /* IE6-9 */
}
.overlay .modal.open .content {
  transform: translate(0, 0px);
  opacity: 1;
}
.overlay .modal .content {
  transform: translate(0, -10px);
  opacity: 0;
  transition: 0.35s ease-in-out;
  padding: 10px;
  background: none;
 
}
.overlay .modal .title {
  margin-top: 1;
  background: #fff;
  color: #fff;
}


/* title graphic */
.title {  
  display: flex;
  align-items: center;
  justify-content: center; 
}

.title img {
  width: 90%;
  height: auto;
}

.grid-1 {
  display: grid;
  /*width: 100%; */
  /* max-width: 1200px; */
  width: 100vw;
  height: 100vh;
  margin: auto;
  
  
  grid-template-columns: 2fr 1fr 1fr;
  grid-template-rows: auto;
  grid-gap: 12px;
  

  grid-template-areas:  "d23    d20     d12"
                        "d2     d14     d4"
                        "d5     d22     d16"
                        "d7     d7      d9"
                        "d1     d1      d9"
                        "d10    d11     d18"
                        "d13    d3      d15"
                        "d6     d24     d24"
                        "d19    d24     d24"
                        "d8    d17     d21";
   
 }

 /* media query */
@media only screen and (min-width: 900px) {
   
  .grid-1 {
    width: 80vw;
    height: 100vh;
    padding: auto;
    margin: auto;
    
    grid-template-columns: repeat(8, 1fr);
    grid-template-areas:    "d4      t       t       t      t t d7      d7"
                            "d2      t       t       t      t  t d11    d12"
                            "d6     t       t       t      t t d9       d9"
                            "d6     d1      d24     d24     d24      d20 d20 d8"
                            "d17    d18     d24     d24     d24  d5    d22 d22"
                            "d23     d23     d24     d24     d24 d5   d15 d19"
                            "d23     d23     d16     d16     d21 d5   d15 d19"
                            "d3     d3     d16     d16     d13 d10   d14 d14";
  }

 
   
}

section div {
   background: none; 
  padding: 0px;
}

/* individual items */
  .title {
    grid-area: t;
    background: url(../img/bgi.png);
    background-size: cover;
  }
  .day-1 {
    grid-area: d1;
    background: <?php the_field('day_bg','option');?>;
    background-size: cover;
    background-repeat: none;
  }
  .day-1 .back {
    grid-area: d1;
    background: <?php the_field('day_bg_back','option');?>;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-2 {
    grid-area: d2;
    background: url(../img/5.png);
    background-size: cover;
    background-repeat: none;
  }
  .day-2 .back {
    grid-area: d2;
    background: #f2cbc2;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-3 {
    grid-area: d3;
    background: url(../img/6.png);
    background-size: cover;
    background-repeat: none;
  }
  .day-3 .back {
    grid-area: d3;
    background: #f2cbc2;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-4 {
    grid-area: d4;
    background: url(../img/8.png);
    background-size: cover;
    background-repeat: none;
  }
  .day-4 .back {
    grid-area: d4;
    background: #f2cbc2;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-5 {
    grid-area: d5;
    background: url(../img/6.png);
    background-size: cover;
    background-repeat: none;
  }
  .day-5 .back {
    grid-area: d5;
    background: #f2cbc2;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-6 {
    grid-area: d6;
    background: url(../img/5.png);
    background-size: cover;
    background-repeat: none;
  }
  .day-6 .back {
    grid-area: d6;
    background: #f2cbc2;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-7 {
    grid-area: d7;
    background: url(../img/8.png);
    background-size: cover;
    background-repeat: none;
  }
  .day-7 .back {
    grid-area: d7;
    background: #f2cbc2;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-8 {
    grid-area: d8;
    background: url(../img/6.png);
    background-size: cover;
    background-repeat: none;
  }
  .day-8 .back {
    grid-area: d8;
    background: #f2cbc2;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-9 {
    grid-area: d9;
    background: url(../img/5.png);
    background-size: cover;
    background-repeat: none;
  }
  .day-9 .back {
    grid-area: d9;
    background: #f2cbc2;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-10 {
    grid-area: d10;
    background: url(../img/8.png);
    background-size: cover;
    background-repeat: none;
  }
  .day-10 .back {
    grid-area: d10;
    background: #f2cbc2;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-11 {
    grid-area: d11;
    background: url(../img/5.png);
    background-size: cover;
    background-repeat: none;
  }
  .day-11 .back {
    grid-area: d11;
    background: #f2cbc2;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-12 {
    grid-area: d12;
    background: url(../img/6.png);
    background-size: cover;
    background-repeat: none;
  }
  .day-12 .back {
    grid-area: d12;
    background: #f2cbc2;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-13 {
    grid-area: d13;
    background: url(../img/6.png);
    background-size: cover;
    background-repeat: none;
  }
  .day-13 .back {
    grid-area: d13;
    background: #f2cbc2;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-14 {
    grid-area: d14;
    background: url(../img/5.png);
    background-size: cover;
    background-repeat: none;
  }
  .day-14 .back {
    grid-area: d14;
    background: #f2cbc2;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-15 {
    grid-area: d15;
    background: url(../img/6.png);
    background-size: cover;
    background-repeat: none;
  }
  .day-15 .back {
    grid-area: d15;
    background: #f2cbc2;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-16 {
    grid-area: d16;
    background: url(../img/7.png);
    background-size: cover;
    background-repeat: none;
  }
  .day-16 .back {
    grid-area: d16;
    background: #f2cbc2;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-17 {
    grid-area: d17;
    background: url(../img/8.png);
    background-size: cover;
    background-repeat: none;
  }
  .day-17 .back {
    grid-area: d17;
    background: #f2cbc2;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-18 {
    grid-area: d18;
    background: url(../img/5.png);
    background-size: cover;
    background-repeat: none;
  }
  .day-18 .back {
    grid-area: d18;
    background: #f2cbc2;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-19 {
    grid-area: d19;
    background: url(../img/8.png);
    background-size: cover;
    background-repeat: none;
  }
  .day-19 .back {
    grid-area: d19;
    background: #f2cbc2;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-20 {
    grid-area: d20;
    background: url(../img/7.png);
    background-size: cover;
    background-repeat: none;
  }
  .day-20 .back {
    grid-area: d20;
    background: #f2cbc2;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-21 {
    grid-area: d21;
    background: url(../img/5.png);
    background-size: cover;
    background-repeat: none;
  }
  .day-21 .back {
    grid-area: d21;
    background: #f2cbc2;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-22 {
    grid-area: d22;
    background: url(../img/7.png);
    background-size: cover;
    background-repeat: none;
  }
  .day-22 .back {
    grid-area: d22;
    background: #f2cbc2;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-23 {
    grid-area: d23;
    background: url(../img/8.png);
    background-size: cover;
    background-repeat: none;
  }
  .day-23 .back {
    grid-area: d23;
    background: #f2cbc2;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-24 {
    grid-area: d24;
    background: url(../img/m.gif);
    background-size: cover;
    background-repeat: none;
  }
  .day-24 .back {
    grid-area: d24;
    background: #f2cbc2;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }

/* door styles */
 
.grid-1 input {
  display: none;
}
 
label {
  perspective: 1000px;
  transform-style: preserve-3d;
  cursor: pointer;
 
  display: flex;
  min-height: 100%;
  width: 100%;
  height: 120px;
}
 
.door {
  width: 100%;
  transform-style: preserve-3d;
  transition: all 3000ms;
  border: 0px dashed transparent;
  min-height: 100%;
}


.door div {
   position: absolute;
   height: 100%;
   width: 100%;
   -webkit-perspective: 0;
   -webkit-backface-visibility: hidden;
   -webkit-transform: translate3d(0,0,0);
   visibility:visible;
   backface-visibility: hidden;
   backface-visibility: hidden;
   display: inline-grid;
   align-items: center;
   justify-content: center; 
 }
 
 .door .front {
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
  font-size: 20px;
  font-weight: 800;
  text-shadow: #000000;
  }

 .door .back {
   background-color: none;
   transform: rotateY(180deg);
   text-align: center;
   visibility:visible;
   backface-visibility: hidden;
 }

 label:hover .door {
  border-color: #ffffff;

}
 
:checked + .door {
  transform: rotateY(180deg);
}


.full-list day-* {
  display: none;
}