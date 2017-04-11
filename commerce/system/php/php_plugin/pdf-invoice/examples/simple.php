<?php
include('../phpinvoice.php');
$invoice = new phpinvoice();
  /* Header Settings */
  $invoice->setLogo("images/logo.png");
  $invoice->setColor("#677a1a");
  $invoice->setType("Sale's Report");
  $invoice->setReference("Vendor ID");
  $invoice->setDate(date('d-m-Y',time()));

  $invoice->hide_tofrom();
  /* Adding Items in table */
  $invoice->addItem(date('M dS ,Y',time()),"AMD Athlon X2DC-7450","2.4GHz/1GB/160GB/SMP-DVD/VB",6,false,580,false,3480);
  $invoice->addItem(date('M dS ,Y',time()),"PDC-E5300","2.6GHz/1GB/320GB/SMP-DVD/FDD/VB",4,false,645,false,2580);
  $invoice->addItem(date('M dS ,Y',time()),'LG 18.5" WLCD',"",10,false,230,false,2300);
  $invoice->addItem(date('M dS ,Y',time()),"HP LaserJet 5200","",1,false,1100,false,1100);
  /* Add totals */
  $invoice->addTotal("Total",9460);
  $invoice->addTotal("Total due",9460,true);
  $invoice->setFooternote("www.Stepdoor.com");
  /* Render */
  $invoice->render('example2.pdf','I'); /* I => Display on browser, D => Force Download, F => local path save, S => return document path */
?>