//import 'dart:js';

import 'package:flutter/widgets.dart';
import 'package:med_delivery_fyp/model/product.dart';
import 'package:med_delivery_fyp/screens/about_terms_policy/about_us_screen.dart';
import 'package:med_delivery_fyp/screens/about_terms_policy/policy_screen.dart';
import 'package:med_delivery_fyp/screens/about_terms_policy/terms_screen.dart';
import 'package:med_delivery_fyp/screens/cart/cart_screen.dart';
import 'package:med_delivery_fyp/screens/checkout/checkout_screen.dart';
import 'package:med_delivery_fyp/screens/forgot/forgot_password_page.dart';
import 'package:med_delivery_fyp/screens/home/home.dart';
import 'package:med_delivery_fyp/screens/home/home_screen.dart';
import 'package:med_delivery_fyp/screens/login/login_page.dart';
import 'package:med_delivery_fyp/screens/messages/messages_detail_page.dart';
import 'package:med_delivery_fyp/screens/messages/messages_page.dart';
import 'package:med_delivery_fyp/screens/notifications/notification_screen.dart';
import 'package:med_delivery_fyp/screens/orders/orders_screen.dart';
import 'package:med_delivery_fyp/screens/pharmacy_home_screen/pharm_home_screen.dart';
import 'package:med_delivery_fyp/screens/product_details/product_detail_screen.dart';
import 'package:med_delivery_fyp/screens/signup/signup_page.dart';
import 'package:med_delivery_fyp/screens/splash_zero/splash_page.dart';
import 'package:med_delivery_fyp/screens/user_profile/user_profile_screen.dart';
import 'package:med_delivery_fyp/screens/walkthrough_sc/walkthrough_screen.dart';

import '../screens/order_placed/order_placed_screen.dart';
import '../screens/pharmacy_list/phar_list.dart';

// import '../screens/sign_up/sign_up_screen.dart';
// import '../screens/orders/orders_screen.dart';

final Map<String, WidgetBuilder> routes = {
  Walkthrough.routeName: (context) => Walkthrough(),
  SplashPage.routeName: (context) => SplashPage(),
  LoginPage.routeName: (context) => LoginPage(),
  SignupPage.routeName: (context) => SignupPage(),
  ForgotPasswordPage.routeName: (context) => ForgotPasswordPage(),
  //HomeScreen.routeName: (context) => HomeScreen(),
  Home.routeName: (context) => Home(),
  ProductDetailScreen.routeName: (context) => ProductDetailScreen(),
  NotificationScreen.routeName: (context) => NotificationScreen(),
  PharmacyList.routeName: (context) => PharmacyList(),
  UserProfile.routeName: (context) => UserProfile(),
  PharmacyHome.routeName: (context) => PharmacyHome(),
  MessagesDetailPage.routeName: (context) => MessagesDetailPage(),
  MessagesPage.routeName: (context) => MessagesPage(),
  OrdersScreen.routeName: (context) => OrdersScreen(),
  PolicyScreen.routeName: (context) => PolicyScreen(),
  AboutUsScreen.routeName: (context) => AboutUsScreen(),
  TermsConditionScreen.routeName: (context) => TermsConditionScreen(),
  CartScreen.routeName: (context) => CartScreen(),
  CheckoutScreen.routeName: (context) => CheckoutScreen(),
  OrderPlacedScreen.routeName: (context) => OrderPlacedScreen(),
};
