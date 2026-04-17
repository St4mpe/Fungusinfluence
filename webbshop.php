<?php 
require_once("functions.php");

if(isset($_POST['addHoodieToKart']) || isset($_POST['addT-ShirtToKart']))
{
    if(isset($_POST['vara']))
    {
        $varan=$_POST['vara'];
        $sql="SELECT * FROM orderinfo WHERE produktid='$varan'";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)):
        if ($row['produktid']="$varan")
        {
            $sql="UPDATE orderinfo SET produktantal=produktantal+1 WHERE produktid='$varan'";
            mysqli_query($conn, $sql);
            header("Location: webbshop.php");
        }   
        endwhile;   
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="webbshopStyle.css">
</head>
<body>
    <?php require_once("_header.php");?>
    <section class="main">
        <section class="title">
            <h1>Merch Shoppen</h1>
            <section class="bar"></section>
            <?php if (isset($_SESSION['userLoggedIn']))
            { 
                if ($_SESSION['userLoggedIn'] != 1) 
                {?>
                    <p>Inloggning krävs för att kunna handla</p>
                <?php 
                }
            }
            else
            {
                ?>
                <p>Inloggning krävs för att kunna handla</p>
                <?php 
            }
            ?>
        </section>
        <section class="container">
                <section class="grid-item">
                    <section class="grid-item-content">
                        <img src="https://img.joomcdn.net/f17f1df41dfd3e7db96c299d81c2975d5124bed0_original.jpeg" alt="">
                        <?php if (isset($_SESSION['userLoggedIn']))
                        { 
                            if ($_SESSION['userLoggedIn'] == 1) 
                            {?>
                                <p class="varan">Hoodie - 500kr</p>
                                <section class="till-korgen-knapp">
                                     <form class="addHoodie" action="webbshop.php" method="POST">
                                        <input type="hidden" name="vara" value="hoodie">
                                        <input type="submit" value="Lägg i korgen" name="addHoodieToKart"/>
                                    </form>
                                </section>
                            <?php 
                            }
                        }?>
                    </section>
                </section>
                <section class="grid-item">
                    <section class="grid-item-content">
                        <img src="https://www.emp-shop.se/dw/image/v2/BBQV_PRD/on/demandware.static/-/Sites-master-emp/default/dwb41c5556/images/4/6/2/7/462721a.jpg?sfrm=png" alt="">
                        <?php if (isset($_SESSION['userLoggedIn']))
                        { 
                            if ($_SESSION['userLoggedIn'] == 1) 
                            {?>
                                <p class="varan">T-Shirt - 300kr</p>
                                <section class="till-korgen-knapp">
                                     <form class="addT-shirt" action="webbshop.php" method="POST">
                                        <input type="hidden" name="vara" value="tshirt">
                                        <input type="submit" value="Lägg i korgen" name="addT-ShirtToKart"/>
                                    </form>
                                </section>
                            <?php 
                            }
                        }?>
                    </section>
                </section>
                <section class="grid-item">
                    <section class="grid-item-content">
                        <img src="https://pricespy-75b8.kxcdn.com/product/standard/280/12283767.jpg" alt="">
                        <?php if (isset($_SESSION['userLoggedIn']))
                        { 
                            if ($_SESSION['userLoggedIn'] == 1) 
                            {?>
                                <p class="varan">Brädspel - 450kr</p>
                                <section class="till-korgen-knapp">
                                    <a href="#">Lägg i korgen</a>
                                </section>
                            <?php 
                            }
                        }?>
                    </section>
                </section>
                <section class="grid-item">
                    <section class="grid-item-content">
                        <img src="https://www.merchoid.com/media/mf_webp/jpg/media/catalog/product/cache/bfcb5e98c93238c53d4013e78676b669/t/h/the-last-of-us-part-ii-armored-clicker-pvc-statue-22cm-1.webp" alt="">
                        <?php if (isset($_SESSION['userLoggedIn']))
                        { 
                            if ($_SESSION['userLoggedIn'] == 1) 
                            {?>
                                <p class="varan">Clicker Figur - 250kr</p>
                                <section class="till-korgen-knapp">
                                    <a href="#">Lägg i korgen</a>
                                </section>
                            <?php 
                            }
                        }?>
                    </section>
                </section>
                <section class="grid-item">
                    <section class="grid-item-content">
                        <img src="https://sw6.elbenwald.de/media/8f/fb/93/1629826343/E1063370_1.jpg" alt="">
                        <?php if (isset($_SESSION['userLoggedIn']))
                        { 
                            if ($_SESSION['userLoggedIn'] == 1) 
                            {?>
                                <p class="varan">Ellie Figur - 250kr</p>
                                <section class="till-korgen-knapp">
                                    <a href="#">Lägg i korgen</a>
                                </section>
                            <?php 
                            }
                        }?>
                    </section>
                </section>
                <section class="grid-item">
                    <section class="grid-item-content">
                        <img src="data:image/jpeg;base64,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" alt="">
                        <?php if (isset($_SESSION['userLoggedIn']))
                        { 
                            if ($_SESSION['userLoggedIn'] == 1) 
                            {?>
                                <p class="varan">Joel Figur - 250kr</p>
                                <section class="till-korgen-knapp">
                                    <a href="#">Lägg i korgen</a>
                                </section>
                            <?php 
                            }
                        }?>
                    </section>
                </section>
                <section class="grid-item">
                    <section class="grid-item-content">
                        <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxITEBUSEhIWFhUVFxUaFxYWGBUaFxgVGBoYGBcXFhgYHSghGhomHhYXITEhJyorLi4uGR8zODMsNygtLisBCgoKDg0OGxAQGisgHyU3LTAvMC0wLS8tLy0tNS0vLS0tKy0tLS0tLS0tLS0tLS0tLy0tLS0tLS0tLS0rLS0tLf/AABEIAOEA4QMBIgACEQEDEQH/xAAcAAEAAwEBAQEBAAAAAAAAAAAABQYHBAMCAQj/xABMEAACAQIDAwgFBwkHAgcBAAABAgMAEQQSIQUGMQcTIkFRYXGBIzKRobEUM0JScoLBCCU0U2Jjc7LDFSRDg5LR8BZENZOis+Hi8Rf/xAAYAQEAAwEAAAAAAAAAAAAAAAAAAQIDBP/EACsRAQACAQQCAQIEBwAAAAAAAAABAhEDEiExQVETgZEEIqHRBRUjYXHh8P/aAAwDAQACEQMRAD8A3GlKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKjsbIvOZCRcrcLcXsLAkddhcX8RQSN6/Mw7agcbszMLqzDvBPvFQOKwsiGzE9xubGgvfODtHtFfJnX6w9orPyh7TX5zVSL+cVH9dfaK+Tjov1i+0Vnszonruq/aIHxrgl27g144qD/wAxD8DUGJlpx2nD+tX218NteAf4q+2svbeXAj/uovJr/CvBdt7PZ8wkRm1FxGzXvbj0DrpoeI1txNRM+k7Z9NRbeHCjjOntod4MNYtzgIHEgGw8TWdLtDDvawYgcPQTN5hmQkeVq+Y+ZC2ke4Xg0gZGB14tIp6j7uu9ZRa/qPv/AKXike/0aB/1ZhLXEoI7RXw2+GDFvS8TYd57B2nQ1TcLCjAGOS62t6NkKW8ACP8A8r6OzU5sR2BVSpAKoTdTcEtbMTcA3JOoqY+T1Btp7/77Lph958O7FVe7C1xpcX4aXqVhxCtwPl1+ys4ihWNXGYKHOZ7hBc5Qtzp2KBfurqw2NMdgsgsLAAm/hxN61iJxyzmYie2hUqr4DeZTYF114ahgfC2vxqfw+NRhcH2aj21OMGXTSvwGv2oClKUClKUClKUClKUClKUCsU/KBxUkWJwEsTskiDEFXU2YH0PA1tdYh+UV87gvs4j4wUEhuFyspJlg2haOTgMQNI2/iD/Dbv8AV+zwrVmgV16iD5giv55m3Xwq4DMjtJiCqSh1YW5soGZTHf5vVLMAWBkS5ynSxci+28SMWMGZC2HMTMqNrkZctubP0Qb6rw7ANb56epW8Zqm1ZrOJaXjdjIt35xUQcS50H3j1eNcX9mwSqUGLjIYEdBxmsR1FWuDbrFfXKVtv5Js9pSme7omXPkJDGxswUkadgv3iqDgtuY7EKGXAOF+jz2IZU4EWCMoNrEj1dR3Ve2ppUjOpbCm3UtOKRlMbO5IYlYGXEiZBmsvM5GOY3u0iSXY95uO4VYoNzeb6MU6xoOCrBGSB3sxJJ7zXxsLbLzHmZpWw0qJmCKkIVoxZS0buZAwBIB9Ui4uACL8X/UU+eRUGJbmpHjJZ8CASp425u9iCGHDQisZ1NGtd8zGPfhv/AFJnb5WjD7IVVszZj2hFX3CvcYFR1t7qzDbm+O1YmuDGqk2RZIkDOTayxusrIz/stkJsbA2NovF8oW00fm5GMT8QHhRbi9rqWUqRqBoTSL6Vua4n/BO+O2xPgEIIJbXsax9oqLXdWAG5knJ75m+A0rMYd89pEEtir3I4LBp22ypf4124feXFy2y4uT1Tfor619BoPH2VMXr4hWZtHctAn3QwTMHMJD2A5xJJUkI7C8bBiNOF6kE2XCAAI+Hazk+ZJuaynDbWx7yH085UEjQta4GoGXxPsr0xEuOa5WXFEA2NmmIDaCxseOvDvq0XjxClp9tTbZ0J0MSnxBPxoNnQ/qI/9IrL9lNiy7hhiGKgg353RtDY34GzDTvFfW2cW8JAIYyEZVQk3ZybL7yT4Cp+TCO2oDDRjhFGPuigkReGRf8ASKyHE7nYg3aZ1ZucRMuY6M+UXAtbKC6rfjx48a55dkyYXK7MGj+UmG2pOZTq6k/RvpbuOlU+bnGGnx4jMNugkOYf7Cu2uCH1x4131soUpSgUpSgUpSgUpSgUpSgViH5Rl8+Et9TE/wBGtvrGOX4XmwYtxXEfGGoklKT4UCN7WCgEEnhwRSAeo82bBes1B8lsSrthgosAk4A7FDAAeQFS+zJedhX0h6ULM62W6tzIIkgGVjJKhB6PHS4Glc24cYG3ZrCw/vFgeIGeuXQ0I07zaPLXVm2Ii0LJv5shmmXFYZVbEwwTNlkBaNokAOVRe8cpYqAykXAYNewtxbYw8smHSXDyBFPTZybDmmjezXAN8pZHy/SyZSQDeroxC4sX4SxZR2ZomZiviRJe3YjdlZ5i1WTZc2y1DSYiIyQJFH0nCxSE4Z3PCJSixnO5A89Ky/F/hK6l66kdx9fvH9ltLVmtZq+95EjDQpOmGzsk0iti7c2gjEeZVFiWkJdAAOoMeoKejZuzIoIXlWKPCNJDHJKpISOJspC5+AWxLC+l8vbU0V2gtkePByFbenaZ0vb6Zh5pirfsh7cdRULs+TETxxJjI44vTRy4h5JsOMwifnUSONHYhQyxrZiNAxNySTy/y6NkUnMe+e/p1htGtaZzHP0RD4xMuEheTPE0yk4uU5IbxXmjWN5TeUkogzC41Outhy7d2c5mwu0Q90mnEca2UgQobxOOoiS0z+DR6aVbduxLjMTJGowuKDwqsYaaNhAemJHaLVtcynMoubBbra9cm+WzMZMsGGwwEvyZw7OCiZLIFhRsx1chmY24XXqYV16X4TT07Tesc/vzPTK978VtwsWzFBLGwuJZ1FlA6KzhV4dgAFVHdp2KROCXzY7EOXewJAhzB3AJyk5Rpra9ecGwtt31crcsfnUHSZszE5b8TrpbhXR/0rtPIwEyhnJZrzSAFm0YnKp4108z4YSnZmlDIb5V+UxHom4kSWVCezKc7+a1ybj4lnRwbtbETAtrxLwWBPbxqDTcPaRUBsVHobm8s7DMOFgU0sAAPCvvDcm+IW98UgBtoA5F+08AT5VP5s9J4wmN3JLpO0elp5bFzcKxWLKWItcXHuqq8oSWmR9RlC5hf1Sc2g8Dbv1qbwvJu6tmbFKf8o/i9da8ny2IbEkggiwjAFj4saWrMxhWs4nLplx0KxszyDKJBqrAuHKRhcovw+l2XF+qq7vjjsPLGsUTEuMW1xdbWLSOzrY3K3fRqkk5M4hwxUwHZZPdcV04Xk7wqG/OzsdNSY76a9SaCq7LTPMNd0RHC7QnpjxqQqNw56Y8akq3ZFKUoFKUoFKUoFKUoFKUoFY9y7JebB/Zn+MNbDWTctY9NhfCX4xConpEozdjHYaPBJzsvNzRZpLNcrIokYhVA151coI67FeIHR++TGRpNrGZuMiSsR1XYhj76hMdh1SM6akH2kAf7VNcloI2kikcIZb+dj+NZ17WnUtaIifHS38reLli2dzsDFZY54GRl4ghtfEWuCOBBIOhqo7J3mXak8MMiJFiCrho2jLQTPlDGRSASrhYzo40GgY1b+VpwNmknhzsN7farI9k7dGEmWeFc7orqmYWQO0bIGY31AvfKNTpw4ib4niWmlq30rb6dtQO6CKzLzmEVjlzKUB6IZ2sVupAIfKSLaKvC1fS7HVCFbHYYtocqw3ckKF0RZtb2vbKRfqqM5F5DNFjJJzzjviAzO9mLEoNeHuGgAsNBX5v9tWeLFGGKV448iHKhyi5vf1bVEaVfTot/ENefP6R+zuxJXDMkkk5UR6pnjAlJyul0iYmRjaRhmlIANiQ2t0HKBh41yph5Lam7MtyTqWY6kknUms9Y3JJ1J4k8Se81H7T2qkOh1ci4Ue4seoVeIivTmvqX1ZzblqL8pI6sKfOX/6Vw4rlWVPWijXu5wsfYq3rF8ZtKWX1msPqrcL5jr8651j7qTYjTbFPyvgcFi9kre8Wrj//AK7MxsBCvjHJ8S9ZasNegw9V3rfE1ODlHxUhsskP3UF/eTUrsnerFyTxI0gytJGCAiC4LAEcL1jPyc1ZN1t4eZni+UE5FkjJfiVUMCS3aLefjUxeEW0pjp/STRL2Vx4jSu0OCoIIIIBBGoIOoIPZXHiauycuAc8+oubdLr7jU9Vf2f8ApC/e+BqwUClKUClKUClKUClKUClKUCsm5apLT4MfWMg/9UR/2rWayHltH972f9qX3GKonoVhtqQTMyRhwyFrZiGE0fBnWwGQqAWyG/RBOa4tVs5O4f7+r9ZjceQAqkTbuTwx4fGQo0seQSsVAJUA3swGuVktr3ter/yeAfKwBrlWQXt4f7VlXtbUpFZjCT5Xntswn97D8TpWMttFAq5FCkE3ta58WF++th5ZmA2U1/1sP81YNz7BT0uN+41N45IbHyFyZsPija1518PUHDytXJykfp5/hx/A168gTXw2KP79f/bWvHlI/Tz/AA4/xrSOlVXqj42bnJXfjdjb7I0X3Wq3bTYiGQjjkb4GqdCt6raWmnD2igvXVHH2VZk3aWLZjYqYkuwXm0BsFzlQpYgXLWN7cO415bobHOJxKQqbAgtIw4hFte3eSQPO/VWWXREIj5M1vV+F/LW9Aovbh8L/AIA1t2I5PdnOgUwWI+krMrnxIPS871wycmGBLXzTgfVEgt7SpPvqu6FmRCH8PLQk/Cu3Zm7eJxIJhhZ1F7toq+ALEBm7h52radmbnYCAALhkYj6Ug5xr/Wu97HwtU3JUTf0YUrkl2tOgfZ2KV0aJc8HOXDGG+VkF+IU2t3NbgBV7xNVnE4Vv7RwcqA6NMjkW+aaF2IbtXPHH52qzYmujTtmrl1YxZx7P+fX73wNWCq/s/wCfX73wNWCrsylKUClKUClKUClKUClKUCsh5bjbE4E98vxjrXqx3l1J+UYC31n/AJoRUSLFu9i43wgIPowXj6VtAjmPKb+Fh5Vw8n1hiEA+o1/9INeWNC4PZ8jRjOOc5wqQDpLOrOLdgDn2V+7oaTSWNiEl1H8MWNYU7bavUJjlV2VPidnNDhozJIZIiFBUaKbsbsQOFYzHyd7Wb/sZAOu7Qj2Xk1rin2vi5UyTYqeRTYlXlkZTYaEqWsa5ZAzeszN4sT8TV5vEnwz7bbyR7vT4ODELOEDPKrAI6vayAENlNgb9VQvKShGNLEEAogBsbEi9wD11l+BmlgLGCWSLMLMYndCwGoByEXqYwW+u0YtPlDSpaxjxAEqMO/P0vYRUxeETpS98dCXjZF4sLC/C57aruxNmibEpFe6knMw06C3JPde1vMVdcFtLC49easmCxbdFAM3yaZiLALx5l7204ai1ydIndTZzw454plKyJG4ZTxU5l079NQRoQQai88ZW04xOJd08+I2k/MwACCLXrtYXAZgNWNr5VH/zVz3X2aNnJn+S4mV5PXdVjZgq8BzauSBxNgSe3sENyWRtHLioLXaMra5te2cC5sbA2U+dVjau/wBjXxc1y8YRmQRK5ATKSpuVtma44nytWcVm04hpe22G67Px6TRh0vY3FmVlYEcQVYAg10Xql8le8M2MwbtObtFK0efrZQqsL94zWv3Drq5VlaMThes5jL9Jqt717WkhsBNBh4zxnmOZr/ViiHEjTUnr4VYjWD8s2JnGOZXJEZVDF2FcozWPWc+b2juq2nXdOFdS22Mth3Ya7RsMScQrhishEeosb25tQLXHiLVYMTWdcjWy5YcNFzuYNI0sgVieihWy9E+rfVvva1ouJro04xEw59SczEuPZ/z6/e+BqwVX9n/Pr974GrBWjMpSlApSlApSlApSlApSlArG+Xs+kw3G+TEWI4gjmiDWyVjPL7JllwpH1MQPaI6i3Qkd39rxYmABsrBkBsbHQ8VPeGBB71NfG5sl8RKD+qk98YP41nm7eJELxOxfm+b6YSwY9B3uC2lw1/8AmtXXkzxRlx5cgASLM2UcAD1DuA09lYxXEtL23RDMBZQOkCLCxB6uyvXDxFzlRWY39VQWOvAADUnureBuvgc2b5HBm435pOPsqQweEihXJFGka8cqKqi567KKpudGWJ4Lc/Gy2thnUcWMlo/uqHsSe+1TWG5M5iLyzoh+ois/kXJXzsK1djXhKaibSmOWFbwbnYqEM7orRrcko1wF7SGs3u0qf2Ti3xuEE5e2KwhEMsgsXfCyKRFKwPFkfS/YGJ41oO0lBUgi4IPsrMNywINsthLeixAmgZdfUZDIh8RlUeBNXpOeJU1IxzC/7lbIjw6sQzO8hu8jm7MdbDwFz7a+tucnmCxUxnbnI3b1zEwUP9oMpF+8WNVnY+3Wh6D9IDS47viKsab6YcaNIAbXsbg1Wa2rK0WpaOVn2PsuHDQrDAgRF4DU6nUkk6kk9Zr2xDG2gvVQl37wwHzo8gx+Aril5RcOL2Lm3YjfiBVMTleMYz4X5X01rwxAQ+sAbai4Bse0XqjLvyGAyo+vC9h+NfeD3heaaOO1leRFOutmYA27NDVo07elZ1aR5XrYq5pGk+ioyg9rGxPsA99SGJrphhVECqAFHACubE100rtjDkvbdOXHs/59fvfA1YKr+z/0hfvfA1YKsqUpSgUpSgUpSgUpSgUpSgVif5Q7WkwneJ/6dbZWJflE/OYP/O/p1EiobNaM4IAkc4iSlTwNmEq27xcAd1++rFyPTfnAL+6lPuFVbBQXwmfrCZR96Vr/AMtWDkcb85gfupvwqmOTOWvZq/C1fF6/K5nbh+Sy2BOpsCbAEk27ANSe6qzNi9ozH0cceGTqaU55CO3KugPcfbUrvFtL5PhZp7X5tGYA8L9V+69qwvefbYmKszFnvfMePl2eA4VpSm5S99rZY4sQoImkSQW9ZUKNfvFyCPZ51RcJIIt48OxtZyFPjIkkIt2G5Wuzk32zPPhnWQ5kiOVZGJLkkA5Dca2H0r9YHfVd34lMeNilXimRh4o+Ye8UrG2yZndVIYiHI7RnijMp8VJH4VGYiO8jk9gFuu1ur2mrRvlGFx84HDMD5sqsfeTVc2joA49YEDxHYa6J6cc9OLAqAgU8RYG/V1+yvbGsoB1B06tKmN3hhnDtOmd1C5IgyqXYnW2bQgDq76sq4bBtcDDFl7FgKsewZioI6qymeW+nWfimPag7LBut7+ZHDq4AD3Vad3/0qD+LF/OKj9s5Rimyx80Oj0OFjlGbTq1qQ3e/SoP4sX84rWvMZY4xOG4nhXDia7jwrhxNSOTZ/wCkL974GrBVf2f8+v3vgasFApSlApSlApSlApSlApSlArEvyifnMH4Tf0622sQ/KL+cwf8Anf06SIWHDgbGR1H+GpuOtjKwceIJNe3I8n50H8Gb4LUdsGZo9mP6zxyCQFb6RtmChwNdDoDoLm2tSfJCfzoP4M3wWqHlqsj2F6/A165sSuYWzEeFvxr9jOUAX4VyO9+bSwaTRPFILpIrKw7mFjY9RrKMbyUTl7LiI+bv6zK2e32RoT5jyrWGlrwknFXrea9KWpFu0JsfYkWDw4gi1AuWY8Xc8WPsA8AKz3fOEy42KJBd3yqo7WdiB7zWjbRxgAOtQP8AZ0uDkxOPxEah8kKYIsQSHkB5xgt9GVSeI7atpxMzlW8xWrn3yxCtj5yDcZwPNVVT71NQOKe6EVzmQk3JJJ4k8Se01+G50GpPVXTDknp+YiOyXBIYWIPYRqCPOpLB704nmVBYNlUC7ZiTbztXHjMO4S7KQOsnTjXtgNiM8OZGDC2mUMb27Ld9XmtZZVm0Rw52xReQu1rsdbaCpjZeKKSK4tdGVhfhdTcX7tKqcWJANTGDmqjZt2wd74ZwEf0Un1WPRY/st+B18alsTWIJLpVh2NvbNCAj+kj7Ceko/Zb8D7qDQtnfpC/e+Bqw1Ut3NpxTzK0bX9a4OjDQ8R/wVbaBSlKBSlKBSlKBSlKBSlKBWI/lF+vg/Cb+nW3VmPLTu0+LhV4wTLArMq/XU/OKP2tFI8LddBku7e02XBzwtcq9sv7LBkLW14EKLjuB7b2PkgP50/yZvgtQOwIFOyZpLapiBY9zqgsT2ddTXJL/AOIk/uJ/5RWcdmMLudsDtrxfbI7ayvAbQxCDpEyXAPSubeFc+NEkhLue6wuAPK9YxTnDutOK7vDVhtYt6oLeAJ+FeqLiZNEgk8WUqPa9hVH3B2u2CxUKpI4imdVmjN8pz9BZLN6rBsuo6gQb1qW2N/NnYaVoZsRlkQ2ZObmYjS+uVCOBB860jSj255158Kzi8UmGOY2xOIHqQxAvGjdTTOOJH1B1+0U+fZ+Pncu8GJdmJJJjktc6m2lgO4aVf5+VrZqjotM9upYiPZnK1HS8suE+jhsQftc0vwc1pERHTK1pntV4tztoNwwr/eKL/MwqU2XuJjRIrPCgAOuaRdOw2Qm+ttK+8Ry0/q8D5tN+Aj/GpyHfLEPs9cd6KINz1o/k+IxBvEWBzNG6hQcvrEWFSjL72tuZNMgQGJRcEnM19OIsF10PbXRsXdCaEBGxCGMKFChDfQWuTcfDt6zeuT+3sYdrrs9pkCGDnC8cQD3ylrAOzi2nfUduDtvF43DrLPipLnF81lRYUXJzPOdUea9+u9E5duJ5LoHkZ+fkXMSSqheJ1Ju167MFyb4WP/EnbuLIB7kqh7/7ZxS4hY48RJEoVriLGPLmOYgF8uURtYeprxqk4nac7etiJnv9eR2+JplGX9AndbAp6w/1ysPgRXgx2RGQpkwoPUGmQn2MxNfzw8Q4m1zXrgV9JHYfTT2ZhTKH9T7I2fCkylIo1IvqqKDwPWBerPUDgfnV8T+NT1SkpSlApSlApSlApSlApSlArnxuGzrbrGoPfXRSgwHlI2G+E52SEEYfFMvOIOEcynMdBwDEXHfcdYrk5I3/ADhb9xN/KtbfvJsePEROki5kkXK47upgeog2IPUQDWPbg7Fkwe3Ww0uuWCYq36yI2yuPGxBHUQR1VXAruDI4k2sB58bV4Yt+I9bv8qtOF2XhCqlYJr21VhKxHddRlNd0ceGhAZsKF43klUBQpGtgSTe3dWWfLomn5IpLOsPAACWUC4HWx4aalialOUo55MDI/wA7LgoTLfiSCwVmHG5F/ZXZs3D4Z0xGMxBZsNhnQcyg6UzOTzasT6qcL9t+rrp+8G2pMXiZMTKQGc6KOCIBZUW/UB7Tc9dauXGHMYrDhfvv/wAtX6Y+Fhe4868YmPBSWPYNfcKncHLjli5qOCXJZgDzMnBiSTe37R91QIlMK+awRmsOAVtB36aCr7s/a4Gy1wbwYwMnP3MMiRRtzhkYB+ldlAOotbjxqCh2JteVi6QS3PFrRp1sbEsR1s3H8KnMDu1jCo59CGtYlsVGATmJPRSQ6WYDhUpdkO9wlxS42HZw55VCZ3xLaxmPhzaoQNJEa+p6q8sLt6aFVTDwYPDqJOcCl5W6Yjya3txBHX1V5PuixK5/kiAFdOclfNYEZbCEg3uDx+gvZUlgNxX51cuIgTOFICwMwGQWsLupBYdKxH0R5ylTN4cV8oLu7YWJo+cAWCMIJDZXubOSxYsQG14Go18Ng1tfEM3blTuJvwPWALd/dWgbR3EWZ+m8zMhdboipcLmK6Nm46Ea8G7q+E5PcKhIZZGtpdpAtzppbo8b8e46Uwhm2O5vN6Jiwyi5Nx0tc1gQNOFeeEPpI/tp/MK11N0dnJ6mGie6qQWmlcX4NcCSxANxpeu+HYWFBHN4TDg3Sx+TsxFvWN3U9bIRr1N5MJaHgfnV8T+NT9UvdaRzL6Qkm+hKhdLcNOPjpV0qQpSlApSlApSlApSlApSlApSlB+EVC4rZEZnSQjpoHVH6wsgsyntGgPiBU3Xy6XoM3w2wolYRPLKyqLF2yjVe3o2HRsb6C5tUJtTY6O2Ro0IV2UZpsubpZQbK637bGtMbdqBmLMoYniSB/zsroTYsI1CVG2E5lmmG2bAsBgjggtIqNKriSRWZSWU9EkMANR5cTXrFs1EA5rDwJ6vzeFS97DNq6DrPE2tbga04bPi+oK9Fw6Dgo9gqUKNgppULFYWsQAoAQKLWClTm001Itr3cK8Y9jyWULCejlsS9iT0r58qEE68eu/VWhhQOAr9oM/i3Zly5DCuW6XuXJ6IYDUFeogeVdWG3XmUWug48F7fts1+C+y3XV2pQVKPdNrC8g04dFB29id/uHff3j3SF7mV++zOL6W4AgXt193bVmpQV+PdKAaG7cOOuovr0r66n210R7tYYahB28ANTx4CpilBxJsmEfQHvr1TBRjgi+wV0UoPlY1HAAeAFfVKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUClKUH/9k=" alt="">
                        <?php if (isset($_SESSION['userLoggedIn']))
                        { 
                            if ($_SESSION['userLoggedIn'] == 1) 
                            {?>
                                <p class="varan">Pop Figure Ellie - 300kr</p>
                                <section class="till-korgen-knapp">
                                    <a href="#">Lägg i korgen</a>
                                </section>
                            <?php 
                            }
                        }?>
                    </section>
                </section>
                <section class="grid-item">
                    <section class="grid-item-content">
                        <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMTERUTEhIWFRUXFxYVFRUXFhUVFRUVFRUWFhYYFxcYHSggGBolGxUVITEhJikrMC4uGCAzODMtNykvMCsBCgoKDQ0OFw8NFSsZFRkrKystKysrLTc3NzctKysrKzctNzcrNy0tLS0tNy0tNysrLS0rLSsrLSstKysrKysrK//AABEIAOEA4QMBIgACEQEDEQH/xAAcAAEAAQUBAQAAAAAAAAAAAAAABwEEBQYIAwL/xABREAABAwIDAwcIBQYMAwkAAAABAAIDBBEFEiEGMVEHExRBYYGRCCIyM3FyobJSc7HB0SMkNGKisxY1QmNkdIKSwsPh8KTS8SZEU1R1k5SjxP/EABYBAQEBAAAAAAAAAAAAAAAAAAABAv/EABYRAQEBAAAAAAAAAAAAAAAAAAABQf/aAAwDAQACEQMRAD8AnFERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERARFaVMhB0QXLnALzNQ1WnS3L66YUFz0gJ0kK26XxA8FTpI+gPBBc9KCp0sK359v0B4KhmZ9AIi46Y1OmDgrbnmfQTnmfQ+KC56YOCdMHBW3PM+h8U59n0PiirrpY4J0oK16Qz6HxVOkN+gERedKCr0lqsukt+gFQ1I+g3wRV+J28V9CUcVjelcGt8AqGsd1adyDLIsQydxIuTvCy6AiIgIiICIiAiIgIiIC0Tb3b2HDp4WTxPcyUPOePKS0sLRqw2uPOve/VuK3tc++UUXGamLr2vOG3FvNHM+IuXaoN/wAO5SMLm9GrYw8JQ6K3e8BvgVsFFi1PMLw1EMg/m5Y3/KSucOTXZ6lrp3w1MjmEtHNZXsY5zrm4AcDm0G6y3HEeRaMOjEVa4Z3ltnxB2Uc3LIDdrhfSO27rQTUW9ioVAtPyc4iyomp6avAMLYXk85PCCJucy5QwO3c2fgvek2b2iAcYqx77PewjpTjrG9zDYSHddpQTkqFc/Y/j+0GH5OkzuYHlwYT0aXNltm3B1vSG/isbHyr4sD+lA9hgp/ujug6Ssi53Zyw4mN7oT7Ym/dZeg5ZcS4Qf+0f+ZEdCKig6j5SMblbmipBI36TKWZ48Wm3UV7fw72g/8g7/AOHOiprRQm/bfaG1zROaOJpJAB/eVv8Aww2hk0YwtN7aU8I+dpRE6KihCCq2nmF2ud/wcf4KlZs/tC4NM1W9gc9jP0otF5HBouIjuuQgm92gudBx3BYTE9r6CC/O1kII3ta8SPH9hl3X7lCu1Ww1TTthfXVzXc7KI/SllyNylznkvAvaw0G+61HFsOEIbq4l1nC4A80i4uBfXUdfiip+w3lDiqp2RUrHFpewGV4y3BcAcjN/WdTb2KU1zHyUfpEf1jPnC6cQEREBERARUc5WlRVW0CC6c8DeV4PrWjdqrSOJz9erirplC3ruUHwa/sVRXdi+3UTVbTUpGu8Ii4FYOCgjyiH3dRntqh3CSOw8LKZ1CfL+NaP21fzxorS+TA2xak+st4tcFLOIG21FN20bv/0H7lEHJy62K0f18Y8Tb71LeOG21ND20rx+zV/6JRteHi2KVnbT0R8HVYV/hI82X66b4vLvvX1FND0mRgb+XEUTnuy74i+URjN12c2TTqv2qmFb5vrn/ENP3qDmPaPa+rrmxtqpBJzZcWnIxhu6wN8gF/RCwS3flLwLD6bmDh84lD+d5wCaObJl5vJ6Grb5nb+C0hUFVpsR9+5URUdI8m1QOYY1ovdoduADGloIFxvBI9q3RR5yQttTNy6jKM99CNNLBSGsj4k3fbcXuOsLUcTwhwnDmBoZqDa1/YNxB6/Dermv2sZDWOpZfNOUPYdbEECx8bj2r3jmZJd7R1Gwve+u9v2hShTPfC0+aSAAS62a7iRcBouSdSdAvTaCPPC3Nf19I4agairgIB8Du7Vc4fUXaGF2Y9egGh9G9t3h2L1rGawxjUc4HEfqxNc8HueIh3qiL+XSovLSRXtZsrzwu9zI2k+DlH+0IElLHJcZo5Xxu11LJmiaLuvzw7PNC2XlgqBJiTmX9COCA9l3Cb/MWl407zIrHR0cZI/WYHNv4l3xVG4clH6RH77PnC6cXMfJT+kR++z5wunEBERAVHOsqq1qZEHlUzr4pKfNqd32ryY0udZZZrbCwRABVREUREQY+tp7ajcoJ5f/APuftqvniXQpCgXykWAPogOFR9sKCNNg32xOiP8ASYPjI0KYtoR/2nw4/wBHf8tUo55JtmY66pkbI+WMxMbLHJE4Ne2RsjbG5afb3L2o8RrpccjY2oEk0MstPDJOLjI0yN8/ILnQuPHVBNUH8bTf1KnPhUVSyWFenN9efjHEfvWhYjW4tRSS19TTUszRAyF/MSvjDWMle8PtICSbym9hutorvZfbKomjfOMKqSyWQva6N0bxoxkZyh5YXC8Z1HFQc+Vg/KP9532leKlTldxiGeKKNtFNTTiQuIlp2xOewMINnNJzi5CitaBVCoiCZuSHaKNkfNySHgBwPVp1D4KXi8WvcW49S5Y2dhkimilcwhjj5ua4a/sB49fcp6xDZBlcYpKz0WAFkTXOygWG/Wxv16a24aDIseUXBOekimYbSRttfXVt3G1x1f6Lz2Znd5oed2t94tuBJ3Det5FKwMDMoDAA0NtoBuAtwWNpcIZFJ5pNid3Dv9h+xBfUlMGkkAC++3XwufYqgZpyepjAAe2R13DuEbD/AGlcNbZantri3R8PqZW6SSufFGL6mQjmQW34MiL7diCHcfqekipqwQc1a/If1AGlncGtHgsRtOwAtAtb0hbX0wHP14c5zi9Kg5I3x29KVjh1gXYQ4eNh4LE1tSXAAncXDwJI+Yqje+Sn18fvs+YLpxcxclXr2e+z5gunUBERBRxWMmeshUHzSsVIUReYdHoXdyvV5UzbNHsXqiiIiAiIgKBvKV9ZReyf7YVPKgbylvWUXuz/AGxIMV5Pn6XU/UD941WOyEebac9lVWH+6Jz9yvfJ9P55UD+Y+yVi++T6K+0lW618j6x3jKWf4kEpbagSYdXNt6MEo7xCJB9oVjR4g6mwGKeMNLoqGKRocCWlwhYdQCDa/arilkMwxKIg2Mr4+qwzUFMMviXFYfk/xCHEsH6K51nMh6LM0Hz2AMyMeL8WgEHdcEdSgzO22Jx01PHWSRl/R5GPAabOvI10JsT2SnTsCv8AD66KopWVXN+Y+Pncrg0uDS3NY9V7KE+UfGsVha+grnskjflcyURNZzjGOBaWlgAGoAIIuPiZZ2T/AImg/qg/dFBBHKLjNNV1YlpGlrOaa1wLGxnOHPJuG6bi3XsWrIqtF9y0JWx11HU4ZStpKgF9O5pcwtIcBYgktOu+1tdVIeF7fYe8NYKluYNaCCCNQACetc5x0crTcXbYhpIO4l1tbdtlvGyfJ+6rcXzTOZoHuLbAZTcGxF9bgjq3FZE3z43TNYXunjDQCSS9vVv3lWOF7VU1RYwytcCcpsRoeremBbJUdM1piha5w1Ej/wAo+/EOdu7lhMc2SjZVtqYG82XH8pkFml19+UaXO88UG7gWGndf4Ln3lZxN4kp6EyF5pY285JuEk7wC51uwAD2lyn+M2YCeFz3BQNyh4Y2SjZXD0xUzQSmx1a58j2F3AgtcL/rN7Eg1/EKn80pnyD8oXlx0tdjCAHG28m41/VWFxWINfYDeGvB7JI2PA7syzGHU4qZaWmzHVzGusb5WFwLu8X/ZVNu6IRVDWC1hG0aG9gL5BfjzZjVGxclfr2e+z5gunVzDyW+uZ7zfmC6eQEREHhWHzVjTvWSrB5qxyIy7NwVV8sOgX0iiIiAiIgKBvKV9bRe7P9sSnlQD5R3rKP2VP7xiDG+T7+mVH1H+axZbk3o5G49iD3MLQRUFuZrm5hJVMLXC+8FrSVpXJTVVzKxzaBkb3ujPONl0ZzbXNJOa4LTfKB2kaKT59u30sjDidBPTaOjbKwtnhObKdHiwB8z0Rc9aDc8GrqaWSobBbPHNkqLMLSZQMtybecbNAuL6AKMcM2JOHU4xSnqnh8cRklhcwFkrbXfEXAghptvINrA7wvfks2qpulYk6WojjbNU89EZXtjztc+XdnI1ALNO1btzMdfh08EMrbHn6cvFnhjmyObqAdRoCNdQQVBhOWqiZJhT5HDzonxPjPWM72xuHsIfu7BwWV2V/iWD+pj90VYcsjw3B5gT6ToWt7SJWOsO2zXHuV/s5pgkP9SH7goOYERfcbbm17LQ9xXPy5TYgcRw3X4/6LctitrJGOyWOXzjlaLNNyTYkagE6+Kttm8IhcWl9uN3b9OF1KeB7NQ5RaMOcRod2UHieG7wKlF9R43PKxrmsAFxcdhB0b1XvbwK2iCK7WZhuF+OpHb3rH4fSiMCwaLd51NuJ38ewrKseDu71B8VxPNSW35H2vuvlNlDVA7n9nKu/pZnze384Y4/YR3qWdp5ctFUu3Wgl/duUabPUIGzEzz/ACopiP7MzreJCCN9hq4RYjTSPJtzoDj2P8x3wcVdbbtc5xmcABJU1QZbrji5mJvhlI7itXBtuUg8pbQKLC7dcUjr6ecXtp3udpxe56o++Sz1zPeb8wXTy5i5LPXN95vzBdOoCIiDzqBdpWLCzBWKkbY2RF/Suu1eysqV9ir1FEREBERAUA+Uf62j9lR+8ap+XP3lGSXlpLfRqB4Sgfcgx3k+t/Ppz/RyPGWL8FKjpOlUMhma05Z5WjTT82rXMjOvXaNt+9RZ5Px/PZ9NOY36aflGd6lDBdaCTtqqv44jMg8dqcEwYFvToaaLnSQ15HMFxbYm8keW28byo05Kdk46vpb21NRTmORjWOp5Ml2u5w+doc3oi2qz/lDg8zSaac5Nc8PNjsnk9D83q/rY/gx34oLE8ntTXuqGPxOZ7aapfAxswfLfKyN2f09Cectu6ld7N4LjckEkLK6JlPG6WkjD4mOMjIi6FxFoy5rfNIuTfTvW7bFeniP/AKhP8IoAr/Z7SmJ/nqs/8XOVBAWN8mdZTxvlzQysjJzmNzrta02c4tc0Gw3m17BanX0fNPy5436A5o3B7de0dfYuhcJMk2EMll88vpZXSONruLmG5PtAK54jeNx/3orBcUeKyRiwc7rt5x67dW7eAe5SRsntg4tIJDQ4BpF7aiwsO64C0LCYIPOMttx33sD3HrWUpa7P+SpmNiG58oaMxHAOtfilEsYXtAal5bGbBnrJP5LSP5DOL+J3C3HdtdPUtDbg2bf/AGPBaDs5C1kLY2DKwcRcuPWe1bMALEl27UX3W3rIy2MtE9JMwEefG9o14tIWmY9AKTZl0drfk2s04yzAk/tEra8OqAdNBu0I103+N1ofLriQZSU1K0+k/OR+rE3KL9l3/sqiFQt325qM+HYSeEMrP7jmNHwAWjrY8dkvh9AOHSf3jB9yo2Pks9cz3m/MF06uYuSv1zPeb8wXTqAiIgK1rYr6hXSFBjIXK+if1K1qKcjUbkhl4oi/ReTHL7zIr6RfJcvh5QfE0vUFAHlB+tpPZU/GdTxIoG8oP11J7s/74oLDkHmy1smhOaMN32A1vc+ClbAtcP8AbVVHxxSVRByJ4lBFXlk7gznGWjc45RzgOjSd3nAutfrAG8hTf0JtLStiDiRz7CCdCTUVrX28ZbdtkoxfKBtdFQsY2aOR4nbK0FmU5SwN3hxF/T49S1XyfWWpan65o8Gf6qx8oaSxovZUfbAslyAa0dQeM9vCJn4qYNq2JeL13biFT8Axv+ErFcn+1kUstTQvIbNFUVJjBPrY3TyPOX9ZuY3HCx42ymwjPMqu3EK0/wD3EfctZHJzSyRmtE08c4dPOHxyMADxJI4Wuw2tYbig1vlL2drKBrpaSqnFE4lromyyBsGckZC0G3NG9hwvY9RMUrpueq6Rgj5Jhcy0JkeBuzOp8xI4a6jgoc2c2UZU0+Z2knWNxA6iQdxIsfYRxVGmUrAXAHd/vgtswutiYGtysB7z9qt67Zp1O83N26nXs1+xW8NM0yWvYEC9x3+KCR8Hr3ONgb3AGmp13FbXHGLBp0G8jXeOK1fZimYWNN9ToBbU3/6rcaagc1oBJJ33Nurfr12UFtSyZZCRr9HUW09m7r+ChXlLxvpWISOBuxlomcLM3/tFymHaNzYaWaX0S2NxHE6aW8AudSb6lIKLL4hODR0rb6tdUXHDMYyPvWIVSdLLQkbkq9cz3m/MF04uY+Sn17Peb8wXTigIiICIiAreWlB3aFXCILAxvbu1QVR6wr9ULRwQWPS+xfLqpXphbwCp0Zv0URjXSXUF+UD6+lv9CY9xmJHwsugn0bTu0UA+UVHlqqVv8y4+Mh/BFYjkmwemqI641MQkaxsNhpmBcZBdp3g94WzU2wNUamohpcQljZSS076ZkhdJEHPj50Xb6ILSRY5TodyxnIdT54q9uYNv0QXO62eUn7Ld6lLDnZaiqd/4lZEwHiGUFPcdxa8dxQQ5j0GK4s3NLAJOiSTQZ4Gi7pAY+cBaX3NgGkENG8q75LNr2YZz9NXMkiY54cHGN945A2zmvbbMLgMI0uLdum77NPdDSVjmHK52MObccH1tLC4a8WlwV/JXl2My0RYwwyUjJ5LtOYvY7m263tbKR1dQQfdJtxhEUT3xVUQaXPlc1uYPc95zPIjcA4uJ7F5bBY1BWYc1geGPLJGSR5gJG53PGYA7wbkh1rXuN4IUK8omJRyVz44KdlO2EupzkIAkMUj2iQ2aLEtsNb7t6leq5PMOFfFEKYBr4aiRwzvy3jlpmtsL6esd4+y0GZxyibFhzqRshtzLaRjnbyXxCFpNt++5t2rGbM7OR09RzDSXARRZ3A3zvDcpd12ByiwJuAAovxXDOZqpYYyGB1RNG0ecDHEJiBlNjbzQPh1qWNlYiy9VK/O6UhpfqbsaAGX/ALNteu10HztTgrNSd2p3XsR+NwoZxmJwqg1vo7geJ13HqU+7T+jcW1FvH/oozxLDWl1txOpO470G1bG0rcrHPOY6EdluvxstznnY/wA3eN+no2B1F+7corpsTMeXKdLgXB+P3b+tbxhWIty5nuyjU3vawAuddwQWHKBLGKCYTHKC0kNsbm9tNO0hc5qaOUzHGmiIb53O6C/U2+nwF+pQurAREVEkclHr2e+z5gum1zJyUevZ77PmC6bUBERAREQEREBERAREQFAvlH4bKZqeoDCYWxmNzxqGvLy4B3C4OnHVT0sZicTX5o3ta9jhlc1wDmuBGoIOhCDmXY+uiZheKsdI0SSMgyMJs54a5+YtB32za2Un8mk0cWGYcJWOc6eomMZ3ZZAaizzqLjIwjr9ILG7Wci0chMlBIIideZkuY/Yx4u5o36HNv3haPUMxnDDDz0chipnl8WYc9TtJBabPaSACHHS437kEyYaWwwzXjEgfibwGm1gZK1rWv1B1YbPHa0bt6xGGxO/hJVF781qQZQBbKwugIafYc2vXc7lpNDyuXaxlRS7qltQ98Tt9pecIEb+3i5ZrZvbihdi1TWSSmKOWGGNgkY7MC0R5s3N5gNWnW9lBGGNs5zFJ2/Sq5B/enI+9dKVDb4kw8Kacf3p6f/kXNdHM2TFGPuMrqtrsxNhldODe56rFdHwTtdiDg1wdamjNwQfWTzcPq1aOfsexx5xCcudcNnma3doOedb3tNLKUdkcUFRATmOUEhuYAXNmnTiL9ahHGX5qmY8ZZD4vJW57GVeemEWZ3mvubHWwNwPZ2diUSp0gujLZAA69+s6Em1tLFa5iLQ3MTa2ttCCfifHTerijqg646x26jdu/FeWIOJacw80Dr3EjTX4KDByuDWZ3EW4gbzfQWubnXirKtxovh5qO3nkg31Nr7/BeeIxve7Lq0dQvp36dYt8PYrAtELiXyiwN/wCSHW83rvru4IMZtnWkmOLWzGg95GmnVp9q1lXGIVJkkc8km5Nr8Or4K3WgRXuF4TPUOyU8MkrtLhjS61+s23DtKkrZfkYmeQ+ukETN/NRkPlPYXasZ1bs3cg8+RfD3y1ALR5rC1z3dTQCCB7TbQe3gV0gtbwDCoaVjIaeMRxtIs0X1Oly4nVxPE6rZFAREQEREBERAREQEREBWFYzzr8fuV+vmRgIsUGNVF7yUzhu1HxVuTx07CqjBYtsZh9TczUcJcd72t5t59r47OPitUxDkYw95vG+eHsa8Pb4PaT8VJF0UELVPIU7Xm68HgHwFviWvP2LES8i2INN2TU7uBD5Gu+LNPFT+qKjnKXkgxQHSOJ3aJmf4iF8M5MsZj9CEj3KiEf4wuj0UHOkewOO39XKO3pUQ/wA1ep5OMbdo4Gx35qphHf55XQqIOfW8j+Jv9N8I96ZzvlaVkaTkPqD62rib7jHyfNlU4IqIqoORCmb66qmk9xrIh7Nc62jDOTbDIdRSteeMpdL+y45fgttVEHxBC1jQ1jWsaNzWgNaPYBoF9ovSKFztw7+pBWnHnD2hZdeNPThvaeP4L2UUREQEREBERAREQEREBERAVHNB3i6qiC3dRsPVb2FebqHg494urxEGPNE7qI+IXyaR/Z4rJIgxfRX/AEfiPxVOjv8Aon4fisqiDFdGf9E/D8U6K/6PxH4rKogxYo38PiF9Chf2eJ/BZJEGPbh563DwuvRuHt6yT4BXiIPJlMwbmjv1+1eqIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiD//Z" alt="">
                        <?php if (isset($_SESSION['userLoggedIn']))
                        { 
                            if ($_SESSION['userLoggedIn'] == 1) 
                            {?>
                                <p class="varan">Mugg - 150krs</p>
                                <section class="till-korgen-knapp">
                                    <a href="#">Lägg i korgen</a>
                                </section>
                            <?php 
                            }
                        }?>
                    </section>
                </section>  
            </section>
    </section>
    <?php require_once("_footer.php");?>
</body>
</html>