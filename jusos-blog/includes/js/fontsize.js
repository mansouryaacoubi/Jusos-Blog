/*exported changeFontSize */
function changeFontSize( inc )
{
  var p		= document.getElementsByTagName( 'p' );
  var n		= 0;
  var size	= 0;

  for ( n = 0; n < p.length; n++ ) {
    size = 0;
	if( p[n].style.fontSize ) {
       size = parseInt( p[n].style.fontSize.replace( 'px', '' ), 10 );
    } else {
       size = 12;
    }
    p[n].style.fontSize = ( size + inc ) + 'px';
   }
}
