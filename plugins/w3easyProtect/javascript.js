/*
################################################################
// w3easyProtect | folder protection Script                    #
// see also w3easy.org cms project                             #
// javascript                                                  #
// Copyright (C) 2011 Joachim Haack                            #
// http://w3easy.org/                                          #
// http://www.w3nord.de/                                       #
                                                               #
// This program is free software: you can redistribute         #
// it and/or modify it under the terms of the                  #
// GNU General Public License as published by                  #
// the Free Software Foundation, either version 3 of           #
// the License, or (at your option) any later version          #
                                                               #
// Keep intact all copyright notices!                          #
                                                               #
// This program is distributed in the hope that it will        #
// be useful, but WITHOUT ANY WARRANTY; without even the       #
// implied warranty of MERCHANTABILITY or FITNESS FOR          #
// A PARTICULAR PURPOSE.                                       #
// See the GNU General Public License for more details.        #
                                                               #
// You should have received a copy of the                      #
// GNU General Public License along with this program.         #
// If not, see <http://www.gnu.org/licenses/>.                 #
################################################################
*/
function newWin(){
var example;
example=window.open('example.php','example','width=340, height=300, top=120, left=820, scrollbars=yes');
example.focus();
}

function license(){
var example;
example=window.open('docs/gpl-3.0-standalone.html','license','width=650, height=500, top=120, left=820, scrollbars=yes');
example.focus();
}

function help(){
var example;
example=window.open('docs/help.html','example','width=400, height=400, top=100, left=1000, scrollbars=yes');
example.focus();
}

function showBox(){
// document.getElementById('mbox').style.visibility='visible';
document.getElementById('mbox').style.display='block';
}

function hideBox(){
// document.getElementById('mbox').style.visibility='hidden';
document.getElementById('mbox').style.display='none';
}