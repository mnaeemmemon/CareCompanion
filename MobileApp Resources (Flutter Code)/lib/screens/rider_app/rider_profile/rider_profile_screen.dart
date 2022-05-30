import 'package:flutter/material.dart';
import 'package:med_delivery_fyp/screens/about_terms_policy/about_us_screen.dart';

import 'package:med_delivery_fyp/screens/login/login_page.dart';
import 'package:med_delivery_fyp/screens/orders/orders_screen.dart';
import 'package:med_delivery_fyp/screens/rider_app/rider_profile/rider_account_details_screen.dart';
import 'package:med_delivery_fyp/screens/user_profile/user_account_details_screen.dart';
import '../../../config/constants.dart';
import '../../../config/size_config.dart';
import '../../../helper/data.dart';

class RiderProfileScreen extends StatefulWidget {
  static String routeName = "/riderProfile";

  @override
  _RiderProfileScreenState createState() => _RiderProfileScreenState();
}

class _RiderProfileScreenState extends State<RiderProfileScreen> {
  //

  Widget listTile(
      {required IconData icon,
      required String title,
      required VoidCallback onTap}) {
    return GestureDetector(
      onTap: onTap,
      child: Column(
        children: [
          Divider(
            height: 2,
          ),
          ListTile(
            leading: Icon(icon),
            title: Text(title),
            trailing: Icon(Icons.arrow_forward_ios),
          )
        ],
      ),
    );
  }

  Widget build(BuildContext context) {
    var userData = AppData.rider_1;
    //SizeConfig.init(context);
    return SingleChildScrollView(
      child: Column(
        children: [
          Stack(
            children: [
              Column(
                children: [
                  Container(
                    height: 40,
                    //color: kPrimaryColor,
                    decoration: BoxDecoration(
                      color: kPrimaryColor,
                      borderRadius: BorderRadius.only(
                        bottomLeft: Radius.circular(15),
                        bottomRight: Radius.circular(15),
                      ),
                    ),
                  ),
                  Container(
                    height: getProportionateScreenHeight(500),
                    width: double.infinity,
                    padding: EdgeInsets.symmetric(horizontal: 15, vertical: 10),
                    child: ListView(
                      children: [
                        Row(
                          mainAxisAlignment: MainAxisAlignment.end,
                          children: [
                            Container(
                              width: getProportionateScreenWidth(250),
                              height: 70,
                              padding: EdgeInsets.only(left: 20),
                              child: Row(
                                mainAxisAlignment:
                                    MainAxisAlignment.spaceAround,
                                children: [
                                  Column(
                                    mainAxisAlignment: MainAxisAlignment.center,
                                    crossAxisAlignment:
                                        CrossAxisAlignment.start,
                                    children: [
                                      Text(
                                        userData.username,
                                        style: TextStyle(
                                            fontSize: 14,
                                            fontWeight: FontWeight.bold,
                                            color: kTextColor),
                                      ),
                                      SizedBox(
                                        height: 10,
                                      ),
                                      Text(userData.userEmail),
                                    ],
                                  ),
                                  CircleAvatar(
                                    radius: 15,
                                    backgroundColor: kPrimaryColor,
                                    child: CircleAvatar(
                                      radius: 12,
                                      child: Icon(
                                        Icons.edit,
                                        color: kPrimaryColor,
                                      ),
                                      backgroundColor: Colors.white,
                                    ),
                                  )
                                ],
                              ),
                            ),
                          ],
                        ),
                        listTile(
                            icon: Icons.location_on_outlined,
                            title: "My Account",
                            onTap: () {
                              Navigator.pushNamed(
                                  context, RiderAccountDetailsScreen.routeName);
                            }),
                        listTile(
                            icon: Icons.add_chart,
                            title: "About",
                            onTap: () {
                              Navigator.pushNamed(
                                  context, AboutUsScreen.routeName);
                            }),
                        listTile(
                            icon: Icons.exit_to_app_outlined,
                            title: "Log Out",
                            onTap: () {
                              Navigator.pushReplacementNamed(
                                  context, LoginPage.routeName);
                            }),
                      ],
                    ),
                  )
                ],
              ),
              Padding(
                padding: const EdgeInsets.only(top: 20, left: 30),
                child: CircleAvatar(
                  radius: 50,
                  backgroundColor: kPrimaryColor,
                  child: CircleAvatar(
                      backgroundImage: NetworkImage(
                        userData.userImage,
                      ),
                      radius: 45,
                      backgroundColor: Colors.white),
                ),
              )
            ],
          ),
          Row(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              Container(
                height: getProportionateScreenHeight(50),
                width: getProportionateScreenWidth(50),
                child: Image.asset('assets/images/delivery.png'),
              ),
            ],
          )
        ],
      ),
    );

    // );
  }
}
