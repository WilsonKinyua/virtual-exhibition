import React, { useRef } from "react";
import { Link, router, usePage } from "@inertiajs/react";
import { toast, ToastContainer } from "react-toastify";
import { isValidEmail } from "../../helpers/validation";
export default function Login() {
    const { errors } = usePage().props;
    const emailRef = useRef<HTMLInputElement>(null);
    const passwordRef = useRef<HTMLInputElement>(null);
    const handleLogin = (e: React.FormEvent<HTMLFormElement>) => {
        e.preventDefault();
        if (!emailRef.current?.value || !passwordRef.current?.value) {
            toast.error("Please fill all the fields");
            return;
        } else if (!isValidEmail(emailRef.current?.value)) {
            toast.error("Please enter a valid email address");
            return;
        }

        router.post("/login", {
            email: emailRef.current?.value,
            password: passwordRef.current?.value,
        });
    };
    return (
        <>
            <section className="signin__area">
                <video autoPlay muted loop>
                    <source src="./videos/login.mp4" type="video/mp4" />
                </video>
                <div className="card sign__center-wrapper ">
                    <div className="card-body sign__input-form">
                        <div className="sign__title-wrapper mb-20 text-center">
                            <h3 className="sign__title text-dark">Sign In</h3>
                            <p>
                                Welcome back, sign in with your credentials
                                below
                            </p>
                        </div>
                        <form
                            onSubmit={(e) => {
                                handleLogin(e);
                            }}
                        >
                            <div className="sign__input">
                                <input
                                    type="email"
                                    placeholder="Enter Your Email address"
                                    name="email"
                                    ref={emailRef}
                                    className={
                                        errors.email ? "form-input-error" : ""
                                    }
                                />
                                <span>
                                    <i className="fa fa-envelope"></i>
                                </span>
                            </div>
                            {errors.email && (
                                <p className="form-error">{errors.email}</p>
                            )}
                            <div className="sign__input">
                                <input
                                    type="password"
                                    placeholder="Enter your Password"
                                    name="password"
                                    ref={passwordRef}
                                    className={
                                        errors.email ? "form-input-error" : ""
                                    }
                                />
                                <span>
                                    <i className="fa fa-lock"></i>
                                </span>
                            </div>
                            <div className="sign__action">
                                <div className="sign__check">
                                    <input
                                        className="e-check-input"
                                        type="checkbox"
                                        name="remember"
                                        id="remember"
                                    />
                                    <label className="sign__check-text">
                                        <span>Remember Me</span>
                                    </label>
                                </div>
                                <div className="sign__forget">
                                    <span>
                                        <Link href="/" className="main-color">
                                            Forget Password?
                                        </Link>
                                    </span>
                                </div>
                            </div>
                            <div className="sing__button mb-20">
                                <button
                                    className="input__btn w-100 mb-20"
                                    type="submit"
                                >
                                    Sign in
                                </button>
                            </div>
                        </form>
                        {/* <div className="if__account mt-85">
                        <p>
                            Don’t Have An Account?
                            <a href="signup.html"> Sign up</a>
                        </p>
                    </div> */}
                    </div>
                </div>
            </section>
            <ToastContainer />
        </>
    );
}
